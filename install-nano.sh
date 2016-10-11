#!/bin/bash
git clone https://github.com/danielpclark/heroku-nano.git
cd heroku-nano
./configure
cd src
make
mkdir ~/bin
cp nano ~/bin/nano