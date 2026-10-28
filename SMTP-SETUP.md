# SMTP configuration

Keep the real SMTP JSON file outside the web document root and outside this Git repository.

Example JSON:

```json
{
  "host": "send.one.com",
  "port": 587,
  "username": "your-email@example.com",
  "password": "REPLACE_WITH_NEW_PASSWORD",
  "encryption": "tls"
}
```

Set the PORTFOLIO_SMTP_CONFIG environment variable to the absolute path of the private JSON file. Never commit actual credentials. Rotate any password previously committed to Git history.
