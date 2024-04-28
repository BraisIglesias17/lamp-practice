FROM debian:11


RUN apt-get update && apt-get -y install mariadb-server mariadb-client

RUN sed -i 's/bind-address[[:space:]]*=[[:space:]]*127.0.0.1/bind-address= 0.0.0.0/' /etc/mysql/mariadb.conf.d/50-server.cnf

ADD --chmod=755 ./start.sh /root/start.sh

CMD /root/start.sh 

EXPOSE 3306
