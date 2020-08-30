FROM node:14

RUN  apt-get update
RUN apt-get install apt-transport-https

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN  apt-get update && apt-get install -y yarn

RUN npm config set unsafe-perm true

EXPOSE 3000

# Set PROJECT USER
RUN useradd -ms /bin/bash symfony
USER symfony
WORKDIR /var/www/symfony-test/

RUN chown -Rh $user:$user /var/www/symfony-test/
USER $user

#RUN mkdir -p /var/www/symfony-test/node_modules




