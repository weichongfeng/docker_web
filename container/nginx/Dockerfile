#nginx 容器配置

#设置镜像
FROM nginx
#设置作者
LABEL MAINTAINER "1181488349@qq.com"

#设置时区
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone