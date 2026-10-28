# Portfolio branch update

This branch keeps index.php and the existing navbar markup unchanged. It upgrades allprojects.php, contactMe.php and CV.php, adds CSS, SEO metadata, sitemap, robots.txt and download-cv.php.

## Before deploying
1. **Immediately rotate the SMTP password exposed in the old contactMe.php.** Removing it from this branch does not remove it from Git history; purge history separately and review other secrets.
2. Upload your current PDF to the site root as CV_Joe_Thomas.pdf. This branch does not invent or publish an unverified CV.
3. Set PORTFOLIO_CONTACT_EMAIL and PORTFOLIO_FROM_EMAIL in your hosting environment. PHP mail() requires configured delivery. Test on hosting.
4. Review projects for accuracy and test the contact form, navigation, mobile layout, metadata and PDF download.
5. This branch is for review; no production deployment or merge has been performed.
