# circumfluous

![](https://images.tmcnet.com/tmc/misc/articles/image/2019-aug/AdobeStock_282378637-dev-ops-supersize.jpeg)

:upside_down_face:

### machine setup
- install `docker` (and `systemctl enable docker` to start on boot)
- install `docker-compose`
- install `haveged` (entropy) (https://www.digitalocean.com/community/tutorials/how-to-setup-additional-entropy-for-cloud-servers-using-haveged)
- [?] install `pass`
- [?] install `docker-credential-pass` (https://github.com/docker/docker-credential-helpers/releases)
- create git remote and working dir (`/var/circumfluous.git` and `/var/circumfluous`)
- create user, add to `users` group, and chmod above directories (see https://medium.com/@francoisromain/vps-deploy-with-git-fea605f1303b)
- [?] init gpg and pass (https://github.com/docker/docker-credential-helpers/issues/102#issuecomment-388974092)
- `docker login`

## [old] ec2 deneb setup

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

`letsencrypt certonly --standalone -d tags.circumfluo.us -d archive.cubegho.st`
