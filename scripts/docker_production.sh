COMMAND=$1
COMPOSES="-f docker-compose.yml -f docker-compose.production.yml"

case $COMMAND in
    up) docker-compose $COMPOSES up -d;;
    restart) docker-compose $COMPOSES restart;;
    shell) docker-compose $COMPOSES exec sh;;
    *) echo "$COMMAND not implemented :(";;
esac
