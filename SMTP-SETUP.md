# SMTP private configuration

Keep the real SMTP credentials **outside the web document root**. For example:

```
hosting-account/
  private-config/smtp.json
  public_html/contactMe.php
```

Example JSON (replace the password with a newly rotated secret):

```json
{
  "host": "send.one.com",
  "port": 587,
  "username": "alerts@joe-thomas.co.uk",
  "password": "REPLACE_WITH_NEW_PASSWORD",
  "encryption": "tls"
}
```

Do not upload the real JSON to GitHub. The repository's .gitignore excludes smtp.json, but Git ignore does not protect a previously committed file or one placed in a public web directory. Configure the hosting environment variable PORTFOLIO_SMTP_CONFIG with the absolute filesystem path to this private file. Rotate the previously exposed password and clean the repository's historical commits separately.

Note: the current main branch PHP contact form still uses PORTFOLIO_SMTP_USERNAME and PORTFOLIO_SMTP_PASSWORD; JSON loading must be implemented before switching configuration.
