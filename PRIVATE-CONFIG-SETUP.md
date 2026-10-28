# Private configuration for deployment

Do not commit real credentials. Store JSON files outside the public web root, e.g. /home/account/private-config/ and public PHP in /home/account/public_html/.

## Contact form
Set PORTFOLIO_SMTP_CONFIG to the absolute filesystem path of smtp.json:

```json
{
  "host": "send.one.com",
  "port": 587,
  "encryption": "tls",
  "username": "alerts@joe-thomas.co.uk",
  "password": "REPLACE_WITH_NEW_PASSWORD",
  "recipient": "YOUR_CONTACT_INBOX"
}
```

The username must be a real SMTP account; change the password after any previous exposure. The form requires a reachable SMTP server and working PHPMailer installation.

## Login
Set PORTFOLIO_AUTH_CONFIG to the absolute filesystem path of auth.json:

```json
{
  "username": "admin",
  "password_hash": "REPLACE_WITH_PHP_PASSWORD_HASH"
}
```

Generate the password hash locally using PHP:
`php -r "echo password_hash('YOUR_NEW_LONG_RANDOM_PASSWORD', PASSWORD_DEFAULT), PHP_EOL;"`

Never store the actual password in auth.json. Set HTTPS on the production host and secure private-file permissions. This single-admin login is a foundation, not a complete internet-facing identity system: add persistent rate limiting, MFA, audit logging and deployment tests before exposing sensitive printer or finance features. The dashboard does not connect to the printer yet.

## Git
The .gitignore excludes smtp.json, auth.json and private configuration directories. Ignore rules do not remove already committed secrets from Git history.
