#!/bin/bash
# entrypoint.sh

# Apply database migrations
python manage.py migrate

# Collect static files
python manage.py collectstatic --noinput


# Add any necessary master data
#echo "Verifying/creating master data..."
#python manage.py shell <<EOF
## Add your custom scripts here to verify or create master data
#from your_app.models import MasterDataModel
#
## Example: Create master data if it doesn't exist
#if not MasterDataModel.objects.filter(name='Default').exists():
#    MasterDataModel.objects.create(name='Default', value='SomeValue')
#EOF

# Default to 3 workers if not set
WORKERS=${WORKERS:-3}

# Start Gunicorn processes
echo "Starting Gunicorn with $WORKERS workers..."
exec gunicorn app.wsgi:application \
    --bind 0.0.0.0:8000 \
    --workers $WORKERS \
    --log-level=info \
    --access-logfile='-'

## Start Gunicorn server
#exec gunicorn app.wsgi:application \
#    --bind unix:/run/gunicorn/app/socket \
#    --workers $WORKERS \
#    --workers $WORKERS \
#    --log-level=info \
#    --access-logfile='-' \
#    "$@"
