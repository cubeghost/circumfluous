COMMAND=$1
COMPOSES="-f docker-compose.yml -f docker-compose.production.yml"

case $COMMAND in
    up) docker-compose $COMPOSES up -d;;
    restart) docker-compose $COMPOSES restart;;
    *) echo "$COMMAND not implemented :(";;
esac
