# ec2 deneb setup

nginx, supervisor, static stuff, some node stuff

### server setup

aws ubuntu

some initial setup:
```
sudo add-apt-repository ppa:certbot/certbot
sudo apt-get update
sudo apt-get install make gcc build-essential tcl vim git
```

service | installation
--- | ---
nginx | `sudo apt-get install nginx`
redis | [digitalocean.com/community/tutorials/how-to-install-and-configure-redis-on-ubuntu-16-04](https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-redis-on-ubuntu-16-04)
node & npm | [digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-16-04](https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-16-04#how-to-install-using-a-ppa)
gulp | `npm install -g gulp`
webpack | `npm install -g webpack`
composer | [https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-16-04](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-16-04)
certbot | `sudo apt-get install letsencrypt`
postfix | `sudo apt-get install postfix`
supervisor | `sudo apt-get install supervisor`
filebeat | [https://www.elastic.co/guide/en/beats/filebeat/current/setup-repositories.html](https://www.elastic.co/guide/en/beats/filebeat/current/setup-repositories.html)
logz | [https://app.logz.io/#/dashboard/data-sources/Filebeat](https://app.logz.io/#/dashboard/data-sources/Filebeat)


### git stuff

git: `/home/ubuntu/circumfluous.git`  
copies to: `/home/ubuntu/www/circumfluo.us`

http://www.jeffhoefs.com/2012/09/setup-git-deploy-for-aws-ec2-ubuntu-instance/


### server git post-receive hook
`/home/ubuntu/circumfluous.git/hooks/post-receive`

```
#!/bin/sh
GIT_WORK_TREE=/home/ubuntu/www/circumfluo.us
export GIT_WORK_TREE
git checkout -f
# filebeat
echo 'copying config and restarting filebeat...'
sudo cp /home/ubuntu/www/circumfluo.us/filebeat.yml /etc/filebeat/filebeat.yml
sudo service filebeat restart
# nginx
echo 'copying config and restarting nginx...'
sudo cp /home/ubuntu/www/circumfluo.us/nginx/nginx.conf /etc/nginx/nginx.conf
sudo cp /home/ubuntu/www/circumfluo.us/nginx/mime.types /etc/nginx/mime.types
sudo service nginx restart
# supervisor
echo 'reloading supervisor...'
sudo cp /home/ubuntu/www/circumfluo.us/supervisor.conf /etc/supervisor/conf.d/supervisor.conf
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl restart all
# done
echo 'cool = true'
```

TODO: eventually something better for deploy lmao

### php notes
short codes are disabled


### ssl notes

`letsencrypt certonly --webroot -w /home/ubuntu/www/circumfluo.us/static -d circumfluo.us -d www.circumfluo.us`

`letsencrypt certonly --standalone -d tags.circumfluo.us -d archive.bldwn.co`

for email:
`letsencrypt certonly --standalone -d bldwn.co -d goose.im -d circumfluo.us`


### email

`/etc/postfix/main.cf`
```
myhostname = circumfluo.us
mydomain = bldwn.co

# Forwarding
virtual_alias_domains = bldwn.co goose.im circumfluo.us
virtual_alias_maps = hash:/etc/postfix/virtual

# TLS parameters
smtpd_tls_cert_file=/etc/letsencrypt/live/bldwn.co/fullchain.pem
smtpd_tls_key_file=/etc/letsencrypt/live/bldwn.co/privkey.pem
smtpd_tls_security_level=may
smtp_tls_cert_file=/etc/letsencrypt/live/bldwn.co/fullchain.pem
smtp_tls_key_file=/etc/letsencrypt/live/bldwn.co/privkey.pem
smtp_tls_security_level=may


smtpd_banner = $myhostname ESMTP $mail_name
biff = no

append_dot_mydomain = no

readme_directory = no

smtpd_relay_restrictions = permit_mynetworks permit_sasl_authenticated defer_unauth_destination
alias_maps = hash:/etc/aliases
alias_database = hash:/etc/aliases
myorigin = /etc/mailname
mydestination = $myhostname, localhost, localhost.localdomain, localhost
relayhost =
mynetworks = 127.0.0.0/8 [::ffff:127.0.0.0]/104 [::1]/128
mailbox_size_limit = 0
recipient_delimiter = +
inet_interfaces = all
inet_protocols = ipv4

local_transport = error:local delivery is disabled
```


`/etc/postfix/virtual` (after changing, run `postmap /etc/postfix/virtual`)
```
@bldwn.co 	ghostbaldwin@gmail.com
@goose.im 	ghostbaldwin@gmail.com
@circumfluo.us 	ghostbaldwin@gmail.com
@gtbrecs.com	ghostbaldwin@gmail.com
```
