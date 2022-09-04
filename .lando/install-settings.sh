#!/bin/sh
EXAMPLE_SETTINGS=/app/web/sites/example.settings.local.php
LOCAL_SETTINGS=/app/web/sites/default/settings.local.php
CUSTOM_SETTINGS=/app/.lando/custom.settings.local.php

# If the local settings file doesn't exist, create it from the example settings.
if [ ! -f $LOCAL_SETTINGS -a -r $EXAMPLE_SETTINGS ]; then
  cp $EXAMPLE_SETTINGS $LOCAL_SETTINGS
  # If the custom settings exist, append it to the local settings.
  if [ -r $CUSTOM_SETTINGS ]; then
    tail -n +2 $CUSTOM_SETTINGS >> $LOCAL_SETTINGS
  fi
fi
