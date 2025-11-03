# https://hub.docker.com/_/nginx
FROM nginx:latest

# Create log files for nux game
ADD . /var/log/nginx/creedo-products

RUN touch /var/log/nginx/creedo-products/access.log
RUN touch /var/log/nginx/creedo-products/error.log

EXPOSE 80
EXPOSE 443
