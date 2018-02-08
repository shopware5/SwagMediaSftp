#!/bin/bash

lastTag=$(git tag | tail -n 1)
customTag=$1

if [ "$customTag" != "" ]; then lastTag=$customTag; fi
if [ "$lastTag" = "" ]; then lastTag="master"; fi

rm -f SwagMediaSftp-${lastTag}.zip
rm -rf SwagMediaSftp
mkdir -p SwagMediaSftp
git archive $lastTag | tar -x -C SwagMediaSftp

cd SwagMediaSftp
composer install --no-dev -n -o
cd ../
zip -r SwagMediaSftp-${lastTag}.zip SwagMediaSftp
rm -r SwagMediaSftp
