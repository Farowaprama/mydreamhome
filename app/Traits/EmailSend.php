<?php

namespace App\Traits;

use Illuminate\Support\Facades\Mail;
trait EmailSend
{
    /*
     * Send Drafts Email===============
     */



    private function default_mail_sender($email,$sub, $msg,$name=null){

        $msgBody  = '<html><body>';

        $msgBody .=  "$msg" . '<br><br>';

        $msgBody .= '</html></body>';
        $name= $name!=null? $name: "Kambaii";

            try {
                Mail::send(array(), array(), function ($message) use ($email,$name,$sub,$msgBody) {
                    $message->to($email,$name)
                            ->subject($sub)
                            //->from(env('MAIL_FROM_ADDRESS','info@kambaiihealth.com'))
                            ->setBody($msgBody, 'text/html');
                });

                return ['status'=>true, 'msg'=>'Mail Send Successfully'];
            } catch (\Throwable $th) {
                 return ['status'=>false, 'msg'=>$th->getMessage()];
            }

    }

    function sendmail_sendgrid($view, $data_forview, $sender_email, $subject)
        {
            //dd($view);
            try {
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $email->setSubject($subject);
                $email->addTo($sender_email, '');
                //$content = view($view, $data_forview)->render();
                $content = $view;

                //dd($content);
                $email->addContent(
                    "text/html",
                    $content
                );
                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                try {
                    $response = $sendgrid->send($email);
                    return 1;
                    //print $response->statusCode() . "\n";
                    //print_r($response->headers());
                    //print $response->body() . "\n";
                } catch (Exception $e) {
                    dump($e);
                }
            } catch (Exception $e) {
                return '';
            }
        }

 /*
    private function send_raw_email_with_attachment($email,$password)
    {

        $sub = "Job Hiring Confirmation";
        $msg = 'Dear Concern, <br>
        Congratulation! you are selected to the job.As soon as, Our team contact with you.
        <br>
         Some documents attached with mail. Please read our service policy.
        <br><br>
        <table border="1">
          <tr>
             <th>User</th>
             <th>Password</th>
          </tr>
          <tr>
             <td> '.$email.' </td>
             <td> '.$password.' </td>
          </tr>
        </table>
        <br><br> For further queries email at: <br>jobs@getacleaner.ca
        <br><br>
        Regards, <br>
        Team GetaCleaner<br>
        www.getacleaner.ca';

        $msgBody  = '<html><body>';

        $msgBody .=  "$msg" . '<br><br>';

        $msgBody .= '</html></body>';


        $file1 = asset('accessibility_policy.pdf');
        $file2 = asset('employee_handbook.pdf');

            try {
                Mail::send(array(), array(), function ($message) use ($email, $sub,$msgBody,$file1,$file2) {
                    $message->to($email)
                            ->subject($sub)
                            ->from(env('MAIL_FROM_ADDRESS','jobs@getacleaner.ca'))
                            ->setBody($msgBody, 'text/html')
                            ->attach(
                                \Swift_Attachment::fromPath($file1)
                                    ->setFilename(
                                        'accessibility_policy.pdf'
                                    )
                                    ->setContentType(
                                        'application/pdf'
                                    )
                            )
                            ->attach(
                                \Swift_Attachment::fromPath($file2)
                                    ->setFilename(
                                        'employee_handbook.pdf'
                                    )
                                    ->setContentType(
                                        'application/pdf'
                                    )
                            );
                });
            } catch (\Throwable $th) {

                return "Email Send faild ! contact with developer to solve this issue. ";
                exit;
                // echo '<pre>';
                // echo '======================<br>';
                // print_r($th->getMessage());
                // echo '<br>======================';
                // exit();
            }

    }

   private function SendTaskCompleteInvoice($TaskMaster,$InvoiceInfo,$CustomerId)
    {

          $ItemDetails = $this->GetItemDetails($TaskMaster->OrderId);

          $CustomerInfo = CustomerInfo::findOrFail($CustomerId);

          $CustomerEmail=$CustomerInfo->Email;
          $InvoiceNumber=$InvoiceInfo->InvoiceNumber;

          try {

            Mail::send('dashboard.email_template.invoice', compact('CustomerInfo','TaskMaster','ItemDetails','InvoiceInfo'), function ($message) use ($CustomerEmail,$InvoiceNumber)
            {
                $message->subject('Get A Cleaener Invoice Details '.$InvoiceNumber);
                $message->from('support@getacleaner.ca');
                $message->to($CustomerEmail);
            });

            return true;

          } catch (\Throwable $th) {

            // return "Email Send faild ! contact with developer to solve this issue. ";
            // exit;
              echo '<pre>';
              echo '======================<br>';
              print_r( $th->getMessage());
              echo '<br>======================';
              exit();

          }




    } */

}
