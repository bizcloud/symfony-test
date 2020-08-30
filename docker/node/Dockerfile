FROM node:14

# Update npm to latest version
RUN npm install -g npm

# Install yarn
RUN npm install -g yarn --force

# Set PROJECT USER
RUN groupmod -g 999 node && usermod -u 999 -g 999 node
RUN useradd -ms /bin/bash symfony
USER symfony
WORKDIR /var/www/symfony-test/


CMD tail -f /dev/null