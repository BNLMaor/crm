<?php 
  //  $connect = $bnl->Imap->connect();
       /* connect to gmail */
       $hostname = '{imap.gmail.com:993/imap/ssl}';
       $trash = '{imap.gmail.com:993/imap/ssl}[Gmail]/Bin';
       $hostname1 = '{imap.gmail.com:993/ssl/novalidate-cert}[Gmail]/INBOX';

       $username = 'daniprime23@gmail.com';
       $password = 'GTAfall123321';
       /* try to connect */
       $connect =  imap_open($hostname."INBOX",$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
    $data = array();
    $getForms = $bnl->DB->get("forms");
    foreach ($getForms as $key=>$value) {
        /* grab emails */
        $emails = imap_search($connect, 'TO "'.$value['unique_id'].'@emailtd.com"');
        /* if emails are returned, cycle through each... */
        if($emails) {
            /* begin output var */
            $output = '';
            /* put the newest emails on top */
            rsort($emails);
            foreach($emails as $email_number) {
                $bodyText = imap_fetchbody($connect,$email_number,1.2);
                if(!strlen($bodyText)>0){
                    $bodyText = imap_fetchbody($connect,$email_number,1);
                }
            
                echo "<br><br>-------------------<br><br>";
                //TODO FIND IP TO HEBREW FORMS
                $ip = $bnl->Imap->getLeadIP($bodyText); // IP OF SENDER
                $uri = $bnl->Imap->getLeadRef($bodyText); // URI = WHERE IT IS CAME FROM
                $name = "";

                
               $fields =  $bnl->Imap->getFields($bodyText); // Fields
            
                $n = $bnl->Imap->parseFields($fields);
                $data['fields'] = $n;
                if ($n) {
                    $n = json_decode($n);
                    //var_dump($n);
                    foreach ($n as $key=>$field){
                        $nameMatches = array("שם","שם מלא","שם פרטי");
                        $phoneMatches = array("מס טלפון","מספר טלפון","טלפון");
                        $emailMatches = array("מייל","אימייל","דואר אלקטרוני",'דוא״ל');
                        $name = $bnl->Imap->tryToMatch($nameMatches,$key,$field);
                        $phone = $bnl->Imap->tryToMatch($phoneMatches,$key,$field);
                        $email = $bnl->Imap->tryToMatch($emailMatches,$key,$field);
                        if ($name) 
                            $data['name'] = $name;
                        if ($phone) 
                            $data['phone'] = $phone;
                        if ($phone) 
                            $data['email'] = $email;
                        
                    }
                }
                
                $form = $bnl->Admin->getFormByUniqueId($value['unique_id']);
                if ($form) {
                    $insert = $bnl->DB->insert("leads",array(":form_id" => $form['id'],":name" => $data['name'],":phone" => $data['phone'],":email" => $data['email'],":uri" => $uri,":ip" => $ip,":fields" => json_encode($n,JSON_UNESCAPED_UNICODE),":data" => $bodyText,":message_id" => $email_number,":timestamp" => time()));
                    if ($insert) {
                        $bnl->Lang->T("data-add-succsesfuly",true,true);
                        //imap_reopen($connect, $hostname.'[Gmail]/Bin');
                        $h = $bnl->Imap->move($connect,$email_number, "[Gmail]/Bin");
                        //var_dump($h);
                        
                        $mailboxes = imap_list($connect, $hostname, '*');
                        var_dump($h);
                        echo imap_last_error();
                        //imap_reopen($connect, $hostname.'INBOX');
                    }
                    else {$bnl->Lang->T("basic-error",true,false);}
                }
            }
        }


    }
    imap_close($connect);
?>