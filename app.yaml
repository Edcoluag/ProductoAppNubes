runtime: php81

handlers:
# Serve static resources.
- url: /(.*\.(css|js|gif|png|jpg|svg|woff|woff2|ttf))$
  static_files: \1
  upload: .*\.(css|js|gif|png|jpg|svg|woff|woff2|ttf)$
  
# Catch-all handler to forward all other requests to the front controller.
- url: /.*
  script: auto

