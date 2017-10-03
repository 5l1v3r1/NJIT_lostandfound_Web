<?php
require_once("header.php");

switch(trim($_GET['action'])){
	case 'post':

		$smarty->assign("form", $_POST);

		if(!checkverifycode($_POST['verifycode'])){$msg="验证码错误，请重新提交"; break;}
		
		switch(trim($_GET['type'])){
			case 'lost':
				$clean['type'] = 0;
				break;
			case 'found':
				$clean['type'] = 1;
				break;
			default:
				header("Location: index.php");
		}

		if($_POST['usertype']=="0"){

			/* 临时用户 */

			$clean['title'] = htmlspecialchars($_POST['guest'].$_POST['title']);
			$clean['contact'] = htmlspecialchars($_POST['contact']);
			$clean['editcode'] = MD5($_GLOBAS['salt'].$_POST['editcode']);
			$clean['available'] = $_POST['available'];
			
			 
			$sql = $db->prepare("INSERT INTO Guests
				(title, contact, editcode, available)
				VALUES(:title, :contact, :editcode, DATE_ADD(NOW(),INTERVAL :available day))");
			$sql->bindParam(':title', $clean['title']);
			$sql->bindParam(':contact', $clean['contact']);
			$sql->bindParam(':editcode', $clean['editcode']);
			$sql->bindParam(':available', $clean['available'], PDO::PARAM_INT);
			
			if(!$sql->execute()){
				$msg = "提交失败，请重试";
				break;
			}
			$result = $db->query("SELECT LAST_INSERT_ID()");
			$row = $result->fetch(PDO::FETCH_NUM);
			$gid = $row[0];

		}
		
		$uid = $_SESSION['user']['id'];
		
		if($_POST['tag']){
			$clean['tag'] = htmlspecialchars(trim($_POST['tag']));
			$sql = $db->prepare("SELECT * FROM Tags WHERE word=:word");
			$sql->bindParam(':word', $clean['tag']);
			$sql->execute();
	
			if($sql->rowCount()){
				$db->exec("UPDATE Tags SET count=count+1 WHERE word='$clean[tag]'");
			}else{
				$db->exec("INSERT INTO Tags (word) VALUES('$clean[tag]')");
			}
		}else $clean['tag'] = '';

		/* 上传文件 */

		if(isset($_FILES['imagefile'])&&($_FILES['imagefile']['error']==UPLOAD_ERR_OK)){

			if(1024*100<$_FILES['imagefile']['size']){
				$msg = "图片大小超过100k，请缩小后上传！";
				break;
			}

			$thumbfile = $_GLOBAS['upload_dir'].uniqid(date('Ymd')."_").".jpg";
			$uploadfile = $_FILES['imagefile']['tmp_name'];
			$size=GetImageSize($uploadfile);
			if($size[2]==1) $im_in=imagecreatefromgif($uploadfile);
			else if($size[2]==2) $im_in=imagecreatefromjpeg($uploadfile);
			else if($size[2]==3) $im_in=imagecreatefrompng($uploadfile);
			else{
				$msg = "图片格式不正确";
				break;
			}
			$width = min($size[0], 400);
			$height = $size[1]*($width/$size[0]);
			$im_out = ImageCreateTrueColor($width, $height);
			ImageCopyresampled($im_out, $im_in, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			Imagejpeg($im_out, $thumbfile);
			chmod($thumbfile, 0775);
			ImageDestroy($im_in);
			ImageDestroy($im_out);
		}

		$clean['uid'] = ($uid=="")?NULL:$uid;
		$clean['gid'] = ($gid=="")?NULL:$gid;
		$clean['what'] = htmlspecialchars($_POST['what']);
		$clean['when'] = $_POST['when'];
		$building = $_POST['building']=="null"?"":$_POST['building'];
		$clean['where'] = htmlspecialchars($building."#".trim($_POST['room']));
		$clean['detail'] = htmlspecialchars($_POST['detail']);
		$clean['imageurl'] = $thumbfile;

		if($_POST['usemap'])
			$clean['mapdata'] = $_POST[mapdata];
		else $clean['mapdata'] = NULL;

		$sql = $db->prepare("INSERT INTO `Items`
			(`uid`,`gid`,`type`,`what`,`when`,`where`,`mapdata`,`imageurl`,`detail`,`tag`)
			VALUES(:uid,:gid,:type,:what,:when,:where,GeomFromText(:mapdata),:imageurl,:detail,:tag)");
		$sql->bindParam(':uid', $clean['uid'], PDO::PARAM_INT);
		$sql->bindParam(':gid', $clean['gid'], PDO::PARAM_INT);
		$sql->bindParam(':type', $clean['type'], PDO::PARAM_INT);
		$sql->bindParam(':what', $clean['what']);
		$sql->bindParam(':when', $clean['when']);
		$sql->bindParam(':where', $clean['where']);
		$sql->bindParam(':mapdata', $clean['mapdata']);
		$sql->bindParam(':imageurl', $clean['imageurl']);
		$sql->bindParam(':detail', $clean['detail']);
		$sql->bindParam(':tag', $clean['tag']);
		$sql->execute();
		$arr = $sql->errorInfo();

		$result = $db->query("SELECT LAST_INSERT_ID()");
		$row = $result->fetch(PDO::FETCH_NUM);
		$_SESSION['postid'] = $row[0];		
		
		switch($clean['type']){
			case 0:
				header("Location: lost.php?id=".$_SESSION['postid']);
				break;
			case 1:
				header("Location: found.php?id=".$_SESSION['postid']);
				break;
		}
		break;
	case 'quickpost':
		$smarty->assign("what", $_POST['itemname']);
		break;
}

$smarty->assign("msg", $msg);

switch(trim($_GET['type'])){
	case 'lost':
		$smarty->display("post_lost.tpl");
		break;
	case 'found':
		$smarty->display("post_found.tpl");
		break;
	case 'letter':
		$smarty->display("post_letter.tpl");
		break;
	default:
		header('Location: index.php');
}

require_once("header.php");
?>