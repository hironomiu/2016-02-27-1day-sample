yum install -y vim
yum install -y emacs
yum install -y epel-release
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
firewall-cmd --add-service=http --permanent
firewall-cmd --permanent --add-port=8080/tcp
firewall-cmd --reload
yum install -y httpd
yum install -y lsof
yum install -y varnish
yum install -y siege
yum install -y --enablerepo=remi-php56 php php-cli php-common php-devel php-pdo php-xml php-mbstring php-mysqlnd php-pecl-memcached php-pecl-xdebug php-opcache php-mcrypt
yum -y remove mariadb-libs
rpm -Uvh http://dev.mysql.com/get/mysql-community-release-el7-5.noarch.rpm
yum -y --enablerepo=mysql56-community install mysql-community-server
yum install --enablerepo=remi -y memcached
yum install -y telnet
cp /vagrant/conf/httpd.conf /etc/httpd/conf/httpd.conf
cp /vagrant/conf/varnish.params /etc/varnish/varnish.params
cp /vagrant/conf/default.vcl /etc/varnish/default.vcl
cp /vagrant/conf/my.cnf /etc/my.cnf
systemctl start httpd
systemctl start varnish
systemctl start mysql
systemctl enable httpd.service
systemctl enable varnish.service
systemctl enable memcached.service
mysql < /vagrant/conf/create.sql
mysql < /vagrant/conf/mysql.sql

