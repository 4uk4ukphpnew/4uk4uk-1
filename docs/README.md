   JustFans - Premium content subscription platform | Docs         
        productConfig = {
            name: 'JustFans - Premium content subscription platform',
            version: '6.2.0'
        }
       ![Logo](assets/images/rounded-logo-gradient.svg)6.2.0 - [ Introduction](#introduction)
- [ Requirements](#requirements)
- [ Installation](#submenu1)
    - [Files Setup](#files-setup)
    - [Database Setup](#db-setup)
    - [Installer](#gui)
      
     
- [ Configuration](#submenu2)
    - [ Payments](#payments)
    - [ Crons setup](#crons)
    - [ Emails](#emails)
    - [ Storage](#storage)
    - [ Websockets](#websockets)
    - [ FFMPeg](#ffmpeg)
    - [ Live streams](#streaming)
    - [ reCAPTCHA](#recaptcha)
    - [ Social login](#social-login)
    - [ GEO Blocking](#geoblocking)
     
     
- [ Admin panel](#admin)
- [ Update](#update)
- [ FAQ](#faq)
- [ Contact](#contact)
 
  JustFans - Premium content subscription platform | Docs 
------------------------------------------------------------------------------------------

#### 1. Introduction 

Hey, thanks for purchasing *"JustFans - Premium content subscription platform"*. Here you'll find about everything you need in order to get started with launching your app. If you have any questions, don't hesitate do [ contact us](https://codecanyon.net/user/ic0de).

 #### 2. Requirements 

##### 2.1.Webserver requirements

- Apache webserver with mod\_rewrite, nginx or Litespeed
- A Mysql 5.7.7+ or Mariadb 10.3.17+ DB server and mysqlnd driver
- PHP &gt;= 7.4.26
 
##### 2.2. PHP required extensions:

- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML
- cURL
- exif
- GD
 
##### 2.3. Other, optional requirements:

- FFMpeg *(Optional, if not provided, only mp4 videos will be allowed)*
- AWS S3 for files storage
- AWS CloudFront for secure assets access
- Stripe &amp; Paypal seller accounts &amp; API Keys
 
                 #### 3. Files Setup 

Before proceeding with the actual installation, we need to make sure that you unzip the script content onto the directory that is going to serve your domain. This can be either done via cPanel or command line.

##### 3.1. Upload the script directory onto your server.

 Locate the file manager and upload the `Script` folder onto your web serving directory. You can then even move the contents of the newly extracted `Script` folder onto the side main public directory, but make sure you also copy any hidden files.

 ![](assets/images/docs-file-manager.jpg)##### 3.2. Extract archive contents.

 ![](assets/images/doc-file-upload.jpg)##### 3.3. Configure files permissions 

In order for the script to work properly, you will need to configure the right permissions some of the files &amp; folders you've just extracted. Set the access permissions (`CHMOD`) to `755` for the following folders:

- `vendor`
- `storage`
- `bootstrap`
 
 ![](assets/images/file-permissions.png) You can find more info on how to update access permissions, depending on your setup, at:

- [cPanel - Update file or folder permissions](https://docs.cpanel.net/cpanel/files/file-manager/#update-file-or-folder-permissions)
- [Plesk - Setting File and Directory Access Permissions](https://docs.plesk.com/en-US/12.5/customer-guide/websites-and-domains/website-content/setting-file-and-directory-access-permissions.70738)
- For CLI usage, you can use `chmod 755 filename` for single filer or `chmod -R 755 directory` for setting access to a directory recursively.
 
 ##### 3.4. Changing the public directory Important

Configure your web server's document / web root to point to the `public` directory of the software. For example, if you've uploaded the software in `example.com` folder, your web directory should be changed to `example.com/public` folder.

 You can find more info an how to change your site Document root over at:

- [cPanel - New document root](https://docs.cpanel.net/cpanel/domains/domains/#new-document-root)
- [Defining a Custom Document Root](https://docs.plesk.com/en-US/obsidian/administrator-guide/77500/)
- For custom servers / VPSs you will have to change your DocumentRoot out of the site's virtual host file.
 
  If your hosting provider doesn't allow changing your DocumentRoot, you can temporarily use this [.htaccess](https://pastebin.com/VLSuUH4m) file, placing it just above the script public directory. Use this just as a **temporary solution**.

 #### 4. Database Setup 

  ![](assets/images/mysql-import-step-1.jpg)##### 4.1. Create a new database

 ![](assets/images/mysql-import-step-2.jpg)##### 4.2. Create a new mysql user

 ![](assets/images/mysql-import-step-3.jpg)##### 4.3. Add the user to the database

 ![](assets/images/mysql-import-step-4.jpg) ![](assets/images/mysql-import-step-5.jpg) You can find additional info on how to create databases and users, depending on your setup over at:

- [cPanel - MySQL® Database Wizard](https://docs.cpanel.net/cpanel/databases/mysql-database-wizard/)
- [ Plesk - Website databases ](https://docs.plesk.com/en-US/obsidian/customer-guide/website-databases.69535/)
- [Command line - Creating and managing databases in Mysql/Mariadb](https://www.digitalocean.com/community/tutorials/how-to-create-and-manage-databases-in-mysql-and-mariadb-on-a-cloud-server)
 
  #### 5. Installing the script

The script comes with a ready to go web installer that you can access on the `/install` path, as in `https://your-domain.com/install`.

Once there, you should be able to see a panel like this, which will guide you through a simple, 3 steps installation process.

 ![](assets/images/install steps.png)- 6.1. Checking requirements. If minimum requirements are not met, script will not be installable.
- 6.2. In this form, please enter the database host, name, user and password that you've created on step 3.
- 6.3. In this form you'll be able to set up site's name, your admin user and [ validate your script license](https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-).
 
Once you're done with the installation, you'll be able to customize the rest of your site's aspects via the admin panel.

                     #### 6. Setting up the payments providers

In order to be able to receive payments, you'll need to set up at least one payment provider for your app.

Navigating to `Admin > Settings > Payments` area, you will be able fetch your site's webhook endpoints to be used with Paypal and Stripe, and fields to fill in their Secret &amp; Public keys.

**Stripe**:- Login into your [Stripe](https://dashboard.stripe.com/login) dashboard.
- From the secondary sidebar, please go to [Developers](https://dashboard.stripe.com/developers) &gt; [API Keys.](https://dashboard.stripe.com/apikeys)
- Copy the `Publishable key` and `Secret key` in the admin panel, over at `Admin > Settings > Payments > Processors > Stripe`.
- Next up, from the Developers tab, go to [Webhooks](https://dashboard.stripe.com/webhooks) and click on `Add endpoint`
- For the `Endpoint URL`, please copy the webhook endpoint located at `Admin > Settings > Payments > Processors > Stripe.`.
- For the `Version` field, select the latest version.
- Then, for the `Select events to listen to`, go with the `Select all events`.
- Once done with creating the webhook, you will get a Webhook secret, which will need to be added in the `Admin > Settings > Payments > Stripe Webhooks Secret` field.
 
 **Paypal**: - Login into your Paypal account, using the [Paypal developer dasboard](https://developer.paypal.com/developer/applications/).
- Go to the [My apps &amp; credentials](https://developer.paypal.com/developer/applications/) area, select the `Live` switch button and then hit `Create app` button to create a Paypal app.
- Copy the Paypal's `ClientID` &amp; Paypal `Secret Key` and add them into the admin into the **Settings &gt; Payments** area.
- Go to the [My apps &amp; credentials](https://developer.paypal.com/developer/applications/) area, select the `Live` switch button and then select your freshly created app.
- Scroll down the page until you reach the `Production Webhooks` area, where you'll need to click on the `Add Webhook` button.
- On the Webhook URL field paste your webhook URL. This can be found, as shown in the first screenshoot, over at `Admin > Settings > Payments.`
- For the `Event types`, select `All Events` and hit Save
 
**Coinbase**:- Login into your Coinbase Commerce account, using [coinbase commerce sign in](https://commerce.coinbase.com/signin).
- Go to [Settings section](https://commerce.coinbase.com/dashboard/settings).
- Search for **API keys**
- Click on **Create an API key**, copy the key and add it into the admin panel into **Setting &gt; Payments area**.
- Search for **Webhook subscriptions**
- Click on **Add an endpoint**. The webhook url can be found over at `Admin > Settings > Payments` section.
- Then, click on **Show shared secret** and add that secret into the admin panel, over at `Admin > Settings > Payments`
 
**NowPayments** (Adult content allowed):- Login into your NowPayments account, using [NowPayments sign in](https://account.nowpayments.io/sign-in).
- Go to [Store settings section](https://account.nowpayments.io/store-settings).
- Add a new **API Key**
- Copy the key and add it into the admin panel into **Setting &gt; Payments area** as `NowPayments Api Key`.
- Go back to your NowPayments account over Store settings and generate an `IPN secret key`
- Add secret into the admin panel, over at `Admin > Settings > Payments` as `NowPayments IPN Secret Key`
- The next step is to add crypto wallets into your [NowPayments account](https://account.nowpayments.io/store-settings).
- **We recommend** adding as many wallets as possible with different crypto currencies so the conversion rate will be lower.
- **We recommend** adding a **payment covering percentage** into your [NowPayments account](https://account.nowpayments.io/store-settings) representing percentage of the payment that needs to be paid to be considered completed. Example: If set to 5%, an item priced at $100 will be considered fully paid for if the customer transfers cryptocurrency worth 95$.
 **Payment covering percentage** is useful for the case where customer accidentally paid a lower amount with a few cents so payment is treated as completed instead of partially paid. In case payment is **partially paid** admins will receive an email notification that will require manually processing (either refunding the credit to the customer or approve it manually from the admin panel)    
**CCBill** (Adult content allowed):- Login into your CCBill account, using [CCBill sign in](https://admin.ccbill.com/loginMM.cgi).
- Go to FlexForms Systems and check for **Flex ID**.
- Copy the Flex ID and add it into the admin panel over at `Settings > Payments > Payment processors > CCBill > CCBill FlexForm Id`.
- Add your `CCBill Account Number` over admin settings.
- Login into your CCBill one time payments sub account and go to `Account Info > Sub Account Admin`
- Under left navigation go to `Basic` and set your approval &amp; denial URL's by getting them from the admin panel over at `Admin > Settings > Payments` section
- Then select `Webhooks` from the left navigation and add your webhook (choose **JSON** as Webhook Format). You can find the CCBill Webhook URL over the admin settings section.
- Add your sub account number for one time payments into the admin panel, over at `Settings > Payments > Payment Processors > CCBill > CCBill SubAccount One Time Payments`
- Repeat the above steps for your sub account for recurring payments.
- The last step is to ask CCBill about your `Salt key` and fill that into the admin panel.
- In order to be able to programmatically cancel CCBill subscriptions you need to set up a DataLink API user.
- Login into your CCBill recurring payments sub account and from the top navigation go to `Account info > DataLink Services Suite`
- From the left navigation click on `Add user` and fill in the username and password.
- For `Subsystem` tick on all the checkboxes then add your VPC ip address on the `Valid Ips` field
- Click on store user and add the accounts details into the admin panel, over at `Settings > Payments > Payment processors > CCBill` as `CCBill DataLink Username / Password`
 
**Paystack**:- Login into your Paystack account, using [paystack sign in](https://dashboard.paystack.com/#/login).
- Go to [Settings section](https://dashboard.paystack.com/#/settings/developer).
- Check **API Keys &amp; Webhooks** tab
- Copy the `Secret key` and add it into the admin panel into **Setting &gt; Payments &gt; Payment processors &gt; Paystack**.
- Go into the admin panel and copy `Webook & Callback` URL's and add them into [Paystack](https://dashboard.paystack.com/#/settings/developer)
 
 #### 7. Setting up the cron jobs Important

##### 7.1 Crons setup

In order to get the platform fully functional, including the payment system, emails, offers and more, you will need to set up the following cronjob.

 ```

* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

##### 7.1 Ensure crons are running

Crons plays an important role in the payment system so please ensure the crons are not returning any fatal error when running them (eg:`cd /path-to-your-project && php artisan schedule:run`). You can also make sure there are no errors under the crons log file @ `storage/logs/cronjobs.log`.

 You can find more info an how to set up crons over at:

- [cPanel - Add a cron job](https://docs.cpanel.net/cpanel/advanced/cron-jobs/#add-a-cron-job)
- [Plesk - Scheduling Tasks](https://docs.plesk.com/en-US/obsidian/administrator-guide/server-administration/scheduling-tasks.64993/)
- For VPS servers, you will need to add that line into your `/etc/crontab` file. Based on distribution settings, you might need to include the user as well.
 
  #### 8. Setting up the emailing driver

For the mailing driver you can mainly choose between three main options, which are Mailgun via API, SMTP or PHP mail() function, if available. You also have the logging option, in case you're just debugging things.

The emailing settings can be found over at `Admin > Settings > Emails`. Here's a short description over the settings.

1. Mail from name - Name in which the emails are sent, also attached to email footers.
2. Mail from address - Email address sending from. EG: no-reply@domain.com
 
##### 8.1 Log driver

The logging driver has mainly debugging purposes. Logged emails can be found under the `storage/logs/laravel.log` log file.

##### 8.1 Sendmail driver

The sendmail driver can be used if the PHP mail() function is configured on the server. Most of cPanel shared hosting providers has it enabled.

##### 8.3 Mailgun driver

1. Mailgun domain - The domain/subdomain you've set up to use with mailgun. Must have valid DNS records set up priorly.
2. Mailgun secret - [The domain API key](https://help.mailgun.com/hc/en-us/articles/203380100-Where-Can-I-Find-My-API-Key-and-SMTP-Credentials-)
3. Mailgun endpoint - `api.mailgun.net` for US or `api.eu.mailgun.net` for EU instances
 
##### 8.4 SMTP driver

1. SMTP Host - Your SMTP server host name / IP.
2. SMTP Port - Generally `587` for TLS and `465` for SSL. Can be different based on the email provider.
3. SMTP Encryption - TLS / SSL
4. SMTP Username - Your SMTP username
5. SMTP Password - Your SMTP password
 
 Notes

- To test if emails are properly set up, you can create a new account, if misconfigured, you will get a 500 error, while the account should still be created.
- Generally all drivers are good if running properly, but mailgun API seems to be the fastest.
 
  #### 9. Setting up storage driver

##### 9.1 Setting up AWS S3 hosting &amp; CloudFront

If you dont want to use your server as hosting for your application files you have the option to use AWS S3 (including CloudFront and CloudFront Signed Url's) which is more faster and secure.

 **S3**: To upload your data to Amazon S3, you must first create an Amazon S3 bucket in one of the AWS Regions.

1. Go to [AWS Console](https://aws.amazon.com/console/) and login or create an account.
2. After you successfully login into your account go to **Search for services** area and search for **S3**.
3. Next up, you should be redirected to **S3** page, click on `Buckets > Create bucket`.
4. Set up your bucket `name` and `region`.
5. Enable `Make public using ACL` option.
6. Disable `Block all public access` checkbox.
7. Enable `I acknowledge that the current settings might result in this bucket and the objects within becoming public` checkbox.
8. The other options stay as default.
9. Click on **Create bucket** after you make sure all the details are correct.
10. After you successfully create the bucket, you need to generate the AWS access keys by going again to **Search for services** area and search for **IAM** (Identity and Access Management).
11. Next up, go to `Access management > Users` and click on **Add users**.
12. Set an `username` under user details area and enable `Access key - Programmatic access` under AWS access type area then click on Next.
13. Click on `Attach existing policies directly` under **Set permissions** area then search for `AmazonS3FullAccess` and enable this policy (or you can add a custom policy) then click **Next**.
14. Add a tag if you want or leave it default and finish up the create user process.
15. After you successfully generate the user make sure you save the AWS `Access Key ID` and `Secret access key`.
16. Save `bucket name`, `AWS Access Key ID` and `AWS Secret access key` to the admin panel, over at `Admin > Settings > Storage`.
 
 **CloudFront**: When you want to use CloudFront to distribute your content, you create a distribution and choose the configuration settings you want.

1. Follow steps from **S3** section from above to create bucket.
2. Go to **Search for services** area and search for **CloudFront**.
3. Next up, you should be redirected to CloudFront page, click on `Distributions > Create distribution`.
4. Set your bucket origin under `Origin > Origin Domain` area by searching for previously created bucket.
5. The other options can stay as default as long as you don't want something custom.
6. After you successfully create distribution, save `Distribution domain name` to the admin panel, over at `Admin > Settings > Storage > Aws CloudFront Domain Name` (remove **https://** part from the domain name) and enable **CloudFront**.
7. Check [Steps for Creating a Distribution](https://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/distribution-web-creating.html) for more details about how to create and setup a CloudFront distribution.
 
 **S3 &amp; CloudFront &amp; Signed Url's**: To use signed URLs, you need a signer. A signer is a trusted key group that you create in CloudFront.

1. Create a key pair for a trusted key group:  The following steps use OpenSSL as an example of one way to create a key pair. There are many other ways to create an RSA key pair.   - Run `openssl genrsa -out private_key.pem 2048` command to generate the private key.
    - Use the following command `openssl rsa -pubout -in private_key.pem -out public_key.pem` to extract the public key from the file named `private_key.pem`.
2. To upload the public key to CloudFront: 
    - Sign in to the AWS Management Console and open the [CloudFront console](https://console.aws.amazon.com/cloudfront/v3/home).
    - In the navigation menu, choose `Key management > Public keys > Create public key`.
    - For `Name`, type a name to identify the public key.
    - For `Key`, paste the public key. If you followed the steps in the preceding procedure, the public key is in the file named `public_key.pem`.
     To copy and paste the contents of the public key, you can:
    - Use the cat command on the macOS or Linux command line, like this: `cat public_key.pem`. Copy the output of that command, then paste it into the **Key value** field.
    - Open the `public_key.pem` file with a plaintext editor like Notepad (on Windows) or TextEdit (on macOS). Copy the contents of the file, then paste it into the **Key value** field.
     
      - Click add and **copy** the public key ID. You use it later when you create signed URLs, as the value of the `Key-Pair-Id` field. (this is also the Aws CloudFront Key Pair Id that must be set in admin panel)
3. To add the public key to a key group: 
    - In the navigation menu, choose `Key management > Key groups > Create key group`.
    - For `Name`, type a name to identify the key group.
    - For `Public keys`, select the public key to add to the key group, then choose **Add**.
    - Choose **Create key group**.
4. Adding a signer to a distribution: 
    - Record the key group ID of the key group that you want to use as a trusted signer.
    - Open CloudFront console and choose the distribution whose files you want to protect with signed URLs or signed cookies.
    - Choose the **Behaviors** tab.
    - Select the cache behavior whose path pattern matches the files that you want to protect with signed URLs or signed cookies, and then choose **Edit**.
    - For **Restrict Viewer Access (Use Signed URLs or Signed Cookies)**, choose **Yes**.
    - For **Trusted Key Groups or Trusted Signer**, choose **Trusted Key Groups**.
    - For **Trusted Key Groups**, choose the key group to add, and then choose **Add**. Repeat if you want to add more than one key group.
    - Choose **Save changes** to update the cache behavior.
5. Save previously created public `Key-Pair-Id` to the admin panel, over at `Admin > Settings > Storage > Aws CloudFront Key Pair Id`.
6. Copy previously created private key pair RSA file into project root by following steps: 
    - Copy `private_key.pem` file into `project root`.
    - Add private key file path to the admin panel, over at `Admin > Settings > Storage` and enable **CloudFront Signed Url's**. (If you followed previously steps this path should look like this `private_key.pem`)
7. Make sure your S3 bucket permissions are set to public.
8. Check [Serving private content with signed URLs](https://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/PrivateContent.html) for more details about CloudFront Signed Url's.
 
##### 9.2 Setting up Wasabi storage driver

If you like to use Wasabi instead of S3 for file storage, that can be set by changing the storage driver, out of the `Admin > Settings > Storage > Driver`.

Once you've done that, you wil have to add your credentials which are available over the Wasabi website. Please make sure you account is validated, so buckets can be available to the public.

You will also need to add the following policy to your bucket:

 ```

{
  "Version": "2012-10-17",
  "Statement": [
    {
      "Sid": "AllowPublicRead",
      "Effect": "Allow",
      "Principal": { "AWS": "*" },
      "Action": "s3:GetObject",
      "Resource": [
        "arn:aws:s3:::your-bucket-name",
        "arn:aws:s3:::your-bucket-name/*"
      ]
    }
  ]
}
```

Note, that the Wasabi bucket can not have any dots inside it.

##### 9.3 Setting up Digital Ocean Spaces storage driver

If you like to use [Digital Ocean Spaces](https://m.do.co/c/dec4efd6a4d7) storage, that can be set by changing the storage driver, out of the `Admin > Settings > Storage > Driver`. Once you selected the new driver, proceed with the following steps:

1. Create a new [Spaces access key](https://cloud.digitalocean.com/account/api/tokens) and copy the key and secret.
2. Go to `Admin > Settings > Storage` and add your newly created keys into the `DO Access Key` and `DO Secret Key`
3. Go to [Spaces](https://cloud.digitalocean.com/spaces) area and create a new space. Default settings should be just fine.
4. Select the new bucket. You will then see a link of this format `https://{bucket-name}.{region}.digitaloceanspaces.com`
5. For the `DO Bucket`, insert the `{bucket-name}` url section.
6. For the `DO Region`, insert the `{region}` url section.
 
##### 9.4 Setting up Minio storage driver

Once you got your minio instance ready, you can then proceed with changing the storage driver, out of the `Admin > Settings > Storage > Driver`. Once you selected the new driver, proceed with the following steps:

1. Create a new set of keys and copy the key and secret.
2. Go to `Admin > Settings > Storage` and add your newly created keys into the `Minio Access Key` and `Minio Secret Key`
3. Create a new bucket and fill in the `Admin > Settings > Storage > Minio bucket` For the `Minio Bucket` field.
4. For the `Admin > Settings > Storage > Minio Region`, insert the region your instance is using.
5. For the `Admin > Settings > Storage > Minio Endpoint`, insert the endpoint your instance is using.
 
 #### 10. Setting up Websockets

##### 10.1 Pusher websockets

In order give the app realtime capabilities, used for User messenger &amp; User notifications you will need a [Pusher](https://pusher.com/) account. Once you got that, follow the steps below:

1. Go to [Pusher dashboard](https://dashboard.pusher.com/) and go to the [Channels](https://dashboard.pusher.com/channels) category.
2. Click on `Create app`. Select a `name` and `cluster region` at your preference.
3. Next up, you should be redirected to your new app page. If not, head over [Apps](https://dashboard.pusher.com/apps) and select your app.
4. Copy over the `app_id`, `key`, `secret` and `cluster` and add save them to the admin panel, over at `Admin > Settings > Websockets` area.
 
##### 10.1 Soketi websockets

If you would like to go for a self-hosted solution, then [](https://docs.soketi.app/) Soketi is also available.

In order to set it up, change the `Websockets driver` to Soketi and add your configured `Host`, `Port`, `App id`, `App key` and `App secret`.

If your soketi instance is running on TSL, enable the `Use TSL for Soketi` toggle and use 443 port.

 #### 11. Setting up FFMpeg

In order to allow your users to upload all types of video formats, you will need to install FFMPEG on your server, if it doesn't have it already. If FFMPEG is not available, the allowed video extensions will fallback to .mp4 only.

  ##### 11.1 FFMPEG on shared hosting

There are numerous shared hosting providers offering FFMPEG available hosting. Please check with your provider if FFMPEG is available.

##### 11.2 Installing FFMPEG on Windows

In order to run FFMPEG on windows, head over [this github page](https://github.com/BtbN/FFmpeg-Builds/releases), download the latest win64 build and unzip it on your drive. Make sure FFMPEG is running under the same drive as the web server.

##### 11.3 Installing FFMPEG on Ubuntu

 ```

sudo apt update
sudo apt install ffmpeg
```

##### 11.4 Installing FFMPEG on Rhel/Centos

Before proceeding with the installation, we'll need to set up some missing repositories, based on the OS version.

 **Centos 6** ```

$ sudo yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
$ sudo yum install https://download1.rpmfusion.org/free/el/rpmfusion-free-release-8.noarch.rpm https://download1.rpmfusion.org/nonfree/el/rpmfusion-nonfree-release-8.noarch.rpm
$ sudo yum install http://rpmfind.net/linux/centos/8-stream/PowerTools/x86_64/os/Packages/SDL2-2.0.10-2.el8.x86_64.rpm
```

 **Centos 7** ```

$ sudo rpm --import http://li.nux.ro/download/nux/RPM-GPG-KEY-nux.ro
$ sudo rpm -Uvh http://li.nux.ro/download/nux/dextop/el7/x86_64/nux-dextop-release-0-5.el7.nux.noarch.rpm
```

 **Centos 8** ```

$ sudo dnf install https://dl.fedoraproject.org/pub/epel/
$ sudo dnf install https://download1.rpmfusion.org/free/el/rpmfusion-free-release-8.noarch.rpm
$ sudo yum-config-manager --enable powertools
$ sudo dnf install ffmpeg ffmpeg-devel
```

After the repos were added, continue with the installation by running the following command:

 ```
sudo yum install ffmpeg ffmpeg-devel
```

###### 11.5 Adding the FFMPEG path to the admin

Copy the (full path) of the `bin/ffmpeg` and `bin/ffprobe` executables and copy them over the admin panel, at `Admin > Settings > Media`.

You can also test your FFMPEG set up &amp; get full executables paths by running the following commands

 ```

ffmpeg -version # To test installation
which ffmpeg && which ffprobe # To get full exec paths
```

#### 12. Live streaming

 In order to get going with live streaming configuration, you will need to create a [PushrCDN](https://www.pushrcdn.com/signup) account. Once logged in, you will need to verify your account by filling in your [personal information](https://www.pushrcdn.com/dashboard/account.php) and [payments info](https://www.pushrcdn.com/dashboard/payments.php) Once your account is ready, you can- Go to [CDN](https://www.pushrcdn.com/dashboard/cdn.php) &gt; Push zones &gt; Create push zone
- Copy the CDN Push zone ID and add it to `Admin > Streaming > Pushr Zone Id` field
- Copy the Profile &gt; Personal information &gt; API Key, out of this [page](https://www.pushrcdn.com/dashboard/account.php) and add it to `Admin > Streaming > Pushr Key` field.
- For the `Admin > Streaming > Pushr Encoder`, please use one of the available encoders (eu, us, sg)
 
Once you filled in your PushrCDN Zone ID &amp; API Key, your platform then should support live streaming. Out of the admin panel, you can also set your other settings, like VODs, encoders or bitrates.

 #### 13. Google reCAPTCHA

In order to enable Google reCAPTCHA for public forms (like register page, contact page, etc), you will need to:

- You can get your API Keys from [this link](https://www.google.com/recaptcha/admin).
- Create a new app and use `reCAPTCHA v2 > "I'm not a robot" Checkbox` type of keys.
- Copy your `Site Key` and `Key secret` and add them into the `Admin > Settings > Security > Recaptcha` fields.
 
 #### 14. Social login(s)

##### 14.1 Overview

Though the social login providers UI can change, the general steps that must be taken in order to allow social logins is:

- Get an approved app on the social login provider
- Get the `ClientID` &amp; `Client Secret` keys
- Add the keys within the `Admin > Settings > Social media` category
- Within the `Admin > Settings > Social media` copy the `Callback url` for the provider
- Add the `Callback url` for the respective provider, back on their page over the CallbackUrl/Authorized urls section.
 
##### 14.2 Social providers info

 **Twitter**- 
- Go to [https://developer.twitter.com](https://developer.twitter.com/) and create a new app
- Get elevated access to Twitter api over at [this link](https://developer.twitter.com/en/portal/petition/essential/basic-info)
- Select the Application Environment (dev or prod), name your app, then you will get the `API Key` and `API Key secret` which you need to copy and add them into `Admin > Settings > Social media` section.
- Once the app is created, go to app settings &amp; click on Setup button from user authentication settings menu.
- Enable the checkbox for OAuth 1.0a in users authentication settings.
- For "App permissions" select "Read".
- Enable the "Request email address from users" option.
- Copy admin `Callback url` and add it to `Callback URLs` field, over twitter app's settings.
 
 **Google**- Create a project: 
- Create credentials: [https://console.developers.google.com/apis/credentials](https://console.developers.google.com/projectcreate)
- Select OAuth client ID &gt; Consent &gt; Web application
- Get `Admin > Settings > Social media` &amp; `Client` secret, add them to admin
- Copy admin `Callback url` and add it to `Authorized redirect URIs`
 
 **Facebook**- Go to  and create a new app &gt; Consumer and fill in your details.
- Go to your `App settings > Basic`, then copy the `App ID` &amp; `App secret` and add them in the `Admin > Settings > Social media` section.
- Go to `App > Facebook Login > Settings`
- Copy admin `Callback url` and add it to `Valid OAuth Redirect URIs`
 
 #### 15. GEO-Blocking 

The GEO-Blocking feature can be enabled via the `Admin > Settings > Security` area, where you can enable or disable the feature globally using the `Allow users to be able to geoblock their profiles` switch.

The other setting you need to fill in is the `IP geolocation API key (Abstract API)`. You can get your geo location API key by registering an account over at Abstract API and get your key over this link [IP geolocation API](https://app.abstractapi.com/api/ip-geolocation/tester).

  #### 16 Admin panel 

##### 16.1 General info &amp; how to add new users

If everything went fine, the Admin panel will be available at `http://your-domain.com/admin`. The credentials are set during the installation / user creation.

Once you got your main admin account set up, you can then manage your roles and other admins users from the admin panel itself.

If for some reason you lost access to the account, you can either reset the password of the user or create another and make it an admin using following command or SQL query:

- `php artisan voyager:admin your@email.com`
- `UPDATE users SET `role_id` = 1 WHERE `email` = 'your@email.com'`
 
##### 16.2 Available admin settings

Over the `Admin > Settings` area, you can view and manage your website content and customize different aspects of it. Here's a quick description of the main settings available in the admin area.

#####   Show/Hide features  

 - Dashboard - View quick info about your platform
- Media manager - Browse and manage all site's media
- Users management - Browse and manage all users and their associated data

1. Process users identity checks based on uploaded IDs
2. Manage user roles
3. Manage user wallets
4. Manage user notifications
5. Manage user messages
6. Manage user reactions
7. Manage user lists
8. Manage user lists members
9. Manage user reports
10. Manage homepage featured users
 
3. Posts management - Browse and manage all posts and their associated data
1. Manage post attachments
2. Manage post comments
3. Manage post bookmarks
 
5. Money management - View and manage subscriptions and payments related data
1. Manage subscriptions
2. Manage transactions
3. Manage withdrawals
 
7. Taxes - Manage taxes, countries and regions
8. Pages - Create and manage public pages
9. Settings - Change a wide variety of site settings
1. Site settings
1. Site title
2. Site description
3. Google Analytics Tracking ID
4. Light site logo
5. Dark site logo
6. Site favicon
7. Enable cookies box
8. Allow (users to) switch to dark mode
9. Allow (users to) change site direction (RTL-LTR)
10. Allow (users to) switch languages
11. Default site language
12. Hide identity checks menu - Either show or hide the "Verify" setting category for users
13. Enforce User Identity Check - If set to on, users will be required to complete an identity check upon posting content.
14. Allow PWA Installs
15. Allow QR code generate on profiles
16. Allow gender pronouns
17. Enable email 2FA on logins
18. Default 2FA setting on user register
19. Default profile type on user register
20. Default user privacy setting on user register
21. Enforce platform SSL usage
 
 1. Admin settings
1. Admin Title
2. Admin Description
3. Admin Loading spinner image
4. Admin Icon Image
5. Admin Background Image
 
 1. Feed settings
1. Posts per page
2. Suggestion box total cards
3. Suggestion box cards per page
4. Autoplay suggestions box slides
5. Disable right click on media &amp; view page source
6. Allow post galleries Zoom in
 
 1. Media settings (See [7.4. Setting up FFMpeg](#ffmpeg))
1. FFMpeg Path
2. FFProbe Path
3. Allowed file extensions
4. Max file uploads size (MB) `Do not exceed PHP limits`
5. Max videos length (In seconds)
6. Apply watermark over uploaded assets
7. Watermark image
8. Use profile url watermark - Adds user site profile url as a wattermark
 
 1. Websockets settings (See [7.3. Setting up sockets](#websockets))
 1. Invoices settings - Set payment receiver invoice details &amp; Invoices Prefix
 1. Payments settings (See [7.1. Setting up the payment](#payments) )
1. View stripe &amp; paypal &amp; coinbase webhooks links
2. NowPayments API Key (If not provided, NowPayments payments are disabled)
3. NowPayments IPN Secret (If not provided, NowPayments payments are not working properly)
4. Coinbase API Key (If not provided, Coinbase payments are disabled)
5. Coinbase Webhooks Secret
6. Stripe Public Key (If not provided, Stripe payments are disabled)
7. Stripe Secret Key (If not provided, Stripe payments are disabled)
8. Stripe Webhooks Secret
9. Paypal Client Id
10. Paypal Secret (If not provided, Paypal payments are disabled)
11. Paypal Secret (If not provided, Paypal payments are disabled)
12. Paypal Live Mode ( Must be enabled to receive payments, otherwise, sandbox environment will be used.
13. Site Currency Code
14. Site Currency Symbol
 
 1. Emails settings
1. Email driver - Choose between Log/SMTP/Mailgun. We recommend mailgun via API.
2. Mail from name
3. Mail from address
4. Additionally, each email driver comes with it's configuration fields that must be filled in properly.
 
 1. Storage settings (See [7.2. Setting up AWS &amp; CF](#aws) for advanced configs)
1. Storage driver (Choose between locally hosted files, S3, Wasabi or DO SPaces ones)
 
 1. Social login
1. Set your social login clientIDs &amp; secrets for Facebook, Twitter &amp; Google.
 
 1. Social media
1. Set your social media footer links.
 
 1. Withdrawals and Deposit
1. Set your deposit and withdrawal minimum and maximum constrains.
 
 1. Custom Code / Ads
1. Sidebar Ad - Ad to show in feed &amp; profile right sidebars.
2. Custom CSS Code - Custom code to inject in the platform
3. Custom JS Code - Custom code to inject in the platform
 
     Settings recommendations- For the email driver, we recommend going with the mailgun API Key based method, not the SMTP one, which can slow down the request time.
- For the assets hosting, we strongly recommend using AWS S3 &amp; CloudFront with Presigned URLs. This is the only way you can protect your users assets, meaning the images and video links are served via CloudFront and links are temporary &amp; IP locked.
 
   #### 17. How to update 

Before making an update, always remember to do a complete backup of your website.If you've made any modifications to the software's files, your changes will be lost.1. Make a backup of the `.env` config file located on your server.
2. Upload and replace all the files on your server with what's inside the `Script` folder.
3. Restore your `.env` config file on your server.
4. Go to `https://example.com/update` and follow the update wizard.1
 
1. Updates that do not have database changes, will not show up in the update wizard.
 
 #### 18. FAQ 

- I have a support inquiry, a question or a problem, how can I contact you?You can contact us by sending us a private message over our [Codecanyon profile](https://codecanyon.net/user/ic0de).
- What hosting do you recommend?We recommend using [DigitalOcean](https://m.do.co/c/dec4efd6a4d7), as they offer great performance and flexibility at an affordable price.
- Is installation included in the price?No, installation is not included. We offer installation services for an extra fee, for which you can send us a message.
- My website returns a Not Found message, why?Please ensure that you have `mod_rewrite` enabled on your server.
- I have uploaded my files but getting 500 error. Why?This usually happens when uploading the script files via FTP, while your operating system is skipping the hidden files, including the `.env` file. You can either re-upload that file and the rest of such files, like the `.htaccess` files, or the .zip file onto the server and extract it there.This can also happen when moving files around using Cpanel's file manager. Make sure to go to `Settings > Preferences` and check `Show hidden Files (dotfiles)`, so hidden will also be selectable. 
- How can I translate my website?Make a copy of the default `en.json` language file found in `/resources/lang` folder, and change it according to your needs.
    - The json language file must follow iso format, eg: es.json, ro.json, en.json.
    - If you need to overwrite the validation rules messages or other libraries, the `en` folder can be copied and renamed to the new language code.
            - How can I edit my homepage?
    
    Generally, for each page, including homepage, you will have a skeleton like this one:
    
    
    1. Controllers are found in the *app/Http/Controllers* directory
    2. *resources/views/*page.blade.php view file (for HTML)
    3. *public/js/pages/*page.js (For Javascript changes)
    4. *public/css/pages/*page.css (For CSS changes)
     
    So for the homepage, you would have `home.css, home.js, home.blade.php, etc`. However, you will have to back up and replace your updated files after each update you do on the instance. For the footer, you would have to edit the `resources/views/template/footer.blade.php` file.
    
     
- How can I change the PWA app icons?
    
    In order to change your PWA app icon and splash screen assets, you will need to replace the existing ones within the `public/img/pwa` folder.
    
    Usually, after replacing the assets, the browser cache must be cleaned in order to see the new icon and splash screen in action.
    
     
- How can update my custom modified version of the script?
    
    Our recommendation regarding maintaining custom modified version of the platform is the following:
    
    
    1. Create your own (***private***) github/gitlab repository
    2. Host your custom code changes on a separate branch
    3. Update the main branch with the new update
    4. Merge the updated version onto your branch (resolve any conflicts if that’s the case)
    5. Release your (custom) updated version of the script
    6. Update the platform, as per [How to update](#update) section
     
     
- Assets are not uploaded or shown on local storage, why?First off check if the `Admin > Settings > Site url` field is containing an invalid value. Secondly, you can check if the storage symlink is created properly. If not, please re-create it yourself using the following CLI commands: 
    1. `                                        rm -rf public/storage                                    `
    2. `                                        ln -s storage/app/public public/storage                                    `
     
     
- Site throwing 500 error after changing file storage driver, why?This generally happens when the storage driver credentials or configurations are wrong. If you can't access the admin panel either, you can reset the storage driver by running this query in phpMyAdmin or your DB client `UPDATE `settings` SET `value`='public' WHERE  `id`=95;`.
- I am having issues with uploading large files, what can I do?This is generally a issue with the server/web-server/PHP settings. The following settings can used to increase/bypass max upload limits:
    - `Admin > Settings > Media > Max file uploads size`
    - `Admin > Settings > Media > Chunked uploads`
     
    If still having issues, [these PHP settings](https://pastebin.com/gM92APWv) can be adjusted to desired values, but other server/web-server/firewall settings might affect as well.
- I am having issues with ffmpeg encoded videos, why?This is generally a issue with the server/web-server/FFMpeg build. The issues can be different, from encoder related issues to memory related ones. Generally, the error of the last encoded video can be found over the `storage/logs/laravel.log` file. That usually should contain the real reason of the failure.If the error is (audio) encoder or memory related, the following options might help:
    - `Admin > Settings > Media > FFMpeg video conversion quality preset`
    - `Admin > Settings > Media > FFMPEG Audio encoder`
     
    If the error persists, you might have to adjust server settings or the available ffmpeg build.
- How do I test payments on the demo website? Depending on the payment provider you want to use you can use the following credentials: 
    - **Stripe**:   
         Card No: 4242 4242 4242 4242   
         Date: any future date   
         CVC: 123
    - **PayPal**:   
         Email: sb-mzdi86428457@business.example.com   
         Password: Dz1d\_EP/
    - **CCBill**:   
        VISA - 4111111111111111   
         MasterCard - 5105105105105100   
         Discover - 6011111111111117   
         CVV: 300
     
     
 
 #### 19. Contact us 

For questions, do not hesitate to contact us by sending us a private message over our [CodeCanyon profile page](https://codecanyon.net/user/ic0de).

    ![Logo](assets/images/rounded-logo-white.svg) JustFans - Premium content subscription platform | Documentation.

- [About](#)
- [Documentation](#)
- [Contact](https://codecanyon.net/user/ic0de)
 
 - [Illustation.io](https://illustation.io/)
- [Taskcamp](https://taskcamp.net/)
- [Qdev Techs](https://qdev.tech)
 
    6.2.0   
