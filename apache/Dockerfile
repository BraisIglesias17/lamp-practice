FROM debian:11


RUN apt-get update
RUN apt-get -y install apache2 libapache2-mod-php7.4 php7.4-mysql

ADD --chmod=755 ./start.sh /root/start.sh

CMD /root/start.sh
