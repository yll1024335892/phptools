<?php
/**
 * SMTP邮件发送类
 */
namespace Yll1024335892\Phptools;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MailerClass {
	
	private $mailConfig = array(
		'Host'       => 'smtp.exmail.qq.com', //smtp 服务器地址 
		'Port'       => 25,           //smtp 端口
		'FromName'   => 'phpGrace',    //发件人
		'Username'   => 'support@phpGrace.com', //邮件账户
		'Password'   => '******'       //对应密码
	);
	
	public function __construct(){
		require 'lib/phpmailer/Exception.php';
		require 'lib/phpmailer/PHPMailer.php';
		require 'lib/phpmailer/SMTP.php';
		// 实例化PHPMailer核心类
		$this->mail = new PHPMailer();
		// 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
		$this->mail->SMTPDebug = true;
	}
	
	public function send($mailAddress, $subject, $body, $addAttachments = null){
		if(!is_array($mailAddress)){$mailAddress = array($mailAddress);}
		if($addAttachments != null){
			if(!is_array($addAttachments)){$addAttachments = array($addAttachments);}	
		}
		// 使用smtp鉴权方式发送邮件
		$this->mail->isSMTP();
		// smtp需要鉴权 这个必须是true
		$this->mail->SMTPAuth = true;
		// 链接qq域名邮箱的服务器地址
		$this->mail->Host = $this->mailConfig['Host'];
		// 设置使用ssl加密方式登录鉴权
		//$this->mail->SMTPSecure = 'ssl';
		// 设置ssl连接smtp服务器的远程服务器端口号
		$this->mail->Port = $this->mailConfig['Port'];
		// 设置发送的邮件的编码
		$this->mail->CharSet = 'UTF-8';
		// 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
		$this->mail->FromName = $this->mailConfig['FromName'];
		// smtp登录的账号 QQ邮箱即可
		$this->mail->Username = $this->mailConfig['Username'];
		// smtp登录的密码 使用生成的授权码
		$this->mail->Password = $this->mailConfig['Password'];
		// 设置发件人邮箱地址 同登录账号
		$this->mail->From     = $this->mailConfig['Username'];
		// 邮件正文是否为html编码 注意此处是一个方法
		$this->mail->isHTML(true);
		// 设置收件人邮箱地址
		foreach($mailAddress as $mail){
			$this->mail->addAddress($mail);
		}
		// 添加该邮件的主题
		$this->mail->Subject = $subject;
		// 添加邮件正文
		$this->mail->Body = $body;
		// 为该邮件添加附件
		if($addAttachments != null){
			foreach($addAttachments as $addAttachment){
				$this->mail->addAttachment($addAttachment);
			}
		}
		// 发送邮件 返回状态
		$status = $this->mail->send();
	}
}