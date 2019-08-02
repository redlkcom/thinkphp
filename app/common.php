<?php
use PHPMailer\PHPMailer;




// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// 公共发送邮件函数
function sendEmail($desc_content, $toemail,  $desc_url=""){
        $mail = new PHPMailer();
        $mail->IsSMTP();// 使用SMTP服务
        $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
        $mail->SMTPDebug=0;
        $mail->Host = "smtp-mail.outlook.com";// 发送方的SMTP服务器地址
        $mail->SMTPAuth = true;// 是否使用身份验证
        $mail->Username = "hongye.cf@outlook.com";// 发送方的163邮箱用户名，就是你申请163的SMTP服务使用的163邮箱</span><span style="color:#333333;">
        $mail->Password = "yxy021598";// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！</span><span style="color:#333333;">
        $mail->SMTPSecure = "SSL";// 使用ssl协议方式</span><span style="color:#333333;">
        $mail->Port = 25;// 163邮箱的ssl协议方式端口号是465/994
        $mail->setFrom("hongye.cf@outlook.com","京东");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
        $mail->addAddress($toemail);// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)
        $mail->addReplyTo("","Reply");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
        //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
        //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)
        //$mail->addAttachment("bug0.jpg");// 添加附件
        $mail->Subject = "京东";// 邮件标题
        $mail->Body = "以下是京东发送给你的验证码:".$desc_content."点击可以查看文章地址:".$desc_url;// 邮件正文
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用
 
        if(!$mail->send()){// 发送邮件
            return $mail->ErrorInfo;
        // echo "Message could not be sent.";
        // echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
        }else{
            return 1;
        }
}
 function http_curl($url){
        $curl = curl_init(); // 启动一个CURL会话          
        curl_setopt($curl, CURLOPT_URL, $url);          
        curl_setopt($curl, CURLOPT_HEADER, 0);          
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);          
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
        // 跳过证书检查            
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);  
        // 从证书中检查SSL加密算法是否存在            
        $tmpInfo = curl_exec($curl);     //返回api的json对象         
        //关闭URL请求           
        curl_close($curl);          
        return $tmpInfo;    //返回json对象
  }

  function httppost($url,$data=null,$timeout=0,$isProxy=false){
    $curl = curl_init();
    //设置抓取的url
    if($isProxy){
        $proxy = "127.0.0.1";
        $proxyprot = "8001";
        curl_setopt($curl, CURLOPT_PROXY, $proxy.":".$proxyprot);
    }

    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    //设置post方式提交
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    //设置post数据
    if(!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "cache-control: no-cache",
                "content-type:application/json",)

        );
    }
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
    if($timeout>0){
        curl_setopt($curl, CURLOPT_TIMEOUT,$timeout);
    }
    $output = curl_exec($curl);
    $error = curl_errno($curl);
    curl_close($curl);
    if($error){
        return false;
    }
    return json_decode($output,true);

}