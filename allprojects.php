<?php require_once __DIR__.'/includes/portfolio-seo.php'; ?>
<!doctype html><html lang="en"><head><?php portfolioSeo('Projects | Joe Thomas — Software Engineer','Explore software engineering projects by Joe Thomas, including Python automation, APIs, and full-stack development.','/allprojects.php'); ?><link rel="stylesheet" href="assets/css/portfolio.css?v=4"></head><body>
<?php include __DIR__.'/includes/Header.php'; ?>
<main class="portfolio"><div class="wrap"><p class="eyebrow">Selected work</p><h1>Software built to solve real problems.</h1><p class="lead">I develop backend systems, APIs and automation tools, with experience spanning Python, Java, C#/.NET and cloud infrastructure. Here are examples of how I approach engineering challenges.</p>
<div class="actions"><a class="action primary" href="CV.php">View my CV</a><a class="action" href="https://github.com/JoesThomas" target="_blank" rel="noopener noreferrer">GitHub profile</a></div>
<div class="gridx" id="receipt-printer">
<article class="cardx"><p class="eyebrow">Personal project</p><h2>Thermal Receipt Printer — Daily Tasks</h2><p>A Python-powered application that gathers daily information into a compact printed receipt, with a web interface for configuration and previews.</p><p><strong>Engineering challenges:</strong> integrating third-party services, coordinating data retrieval, formatting constrained printer output, and handling errors gracefully.</p><div class="tags"><span>Python</span><span>Flask</span><span>APIs</span><span>Automation</span><span>Hardware integration</span></div><a href="https://github.com/JoesThomas/ThermalReceiptPrinterDailyTasks" target="_blank" rel="noopener noreferrer">Explore the source code</a></article>
<article class="cardx" id="streamvault"><p class="eyebrow">GitHub project</p><h2>StreamVault</h2><p>Explore the StreamVault project and its implementation in my public repository.</p><div class="tags"><span>Open source</span><span>GitHub</span></div><a href="https://github.com/JoesThomas/StreamVault" target="_blank" rel="noopener noreferrer">View StreamVault repository</a></article>
<article class="cardx" id="job-assignment"><p class="eyebrow">GitHub project</p><h2>Job Application Assignment</h2><p>Source code for a software engineering assignment, available for review on GitHub.</p><div class="tags"><span>Software engineering</span><span>Source code</span></div><a href="https://github.com/JoesThomas/JobApplicationAssignment" target="_blank" rel="noopener noreferrer">View assignment repository</a></article>
<article class="cardx"><p class="eyebrow">GitHub project</p><h2>Binary Expression Tree</h2><p>An additional code project from my public GitHub repositories.</p><a href="https://github.com/JoesThomas/BinaryExpressionTree" target="_blank" rel="noopener noreferrer">View repository</a></article>
</div>
<section class="cardx" id="receipt-demo"><p class="eyebrow">Interactive-free sample • fictional data</p><h2>Example daily receipt</h2><p>This is a fully fictional demonstration of the printed format. No live APIs, accounts, calendar entries, locations or printer are accessed.</p>
<div style="max-width:410px;margin:1.5rem auto;padding:1.5rem 1rem;background:#fff;color:#161616;border-radius:3px;box-shadow:0 12px 28px rgba(0,0,0,.3);overflow-x:auto">
<pre style="margin:0;font:12px/1.42 ui-monospace,SFMono-Regular,Consolas,monospace;white-space:pre;display:table;margin-inline:auto;color:#161616">--------------------------------------------------
               DAILY RECEIPT
             DEMONSTRATION ONLY
--------------------------------------------------
                WEDNESDAY
                28 OCTOBER
--------------------------------------------------
                  WEATHER
             SAMPLE TOWN, UK

Today        Max 15 C       Min 8 C
Rain         35%            Cloudy
Sunrise      07:51          Sunset 17:43

HOUR       09:00  12:00  15:00  18:00
TEMP         9 C   12 C   15 C   11 C
RAIN        10%    20%    35%    15%
--------------------------------------------------
               TODAY'S CALENDAR

[ ] 09:30-10:00  Morning planning
[ ] 13:00-14:00  Project meeting
[ ] 18:30-19:30  Exercise
--------------------------------------------------
                  TO-DO

[ ] Review pull request
[ ] Buy groceries
[ ] Read for 20 minutes
--------------------------------------------------
              FINANCE SNAPSHOT
              FICTIONAL FIGURES

Current account                     GBP 850.00
Savings                           GBP 4,200.00
Upcoming payment                     GBP 25.00
--------------------------------------------------
              REMINDERS

Vehicle MOT                         In 21 days
Birthday reminder                    In 7 days
--------------------------------------------------
                 END OF DAY
               SAMPLE OUTPUT
--------------------------------------------------</pre></div>
<p class="note">Illustrative content only; the live application may display different sections, layout and values depending on configuration.</p><a href="https://github.com/JoesThomas/ThermalReceiptPrinterDailyTasks" target="_blank" rel="noopener noreferrer">See the real Python implementation</a></section>
<section class="cardx"><p class="eyebrow">Architecture</p><h2>How the receipt printer works</h2><p>A simplified view of the real application's data flow.</p><div class="architecture"><div class="arch-node"><strong>Data sources</strong><span>APIs, calendar, finance and local settings</span></div><div class="arch-node flow-center"><strong>Python pipeline</strong><span>Collect, format and build receipt</span></div><div class="arch-node"><strong>Output</strong><span>Web preview or thermal printer</span></div></div><p class="arch-note">Data sources → Python application → preview or printer.</p><a href="https://github.com/JoesThomas/ThermalReceiptPrinterDailyTasks/blob/main/app.py" target="_blank" rel="noopener noreferrer">Explore the actual orchestration code</a></section><section class="cardx"><p class="eyebrow">From the source code</p><h2>Real implementation examples</h2><p>These excerpts are taken from my public Thermal Receipt Printer repository. They show how I handle device constraints and protect private configuration.</p>
<h3>1. Receipt-width formatting</h3><p>The receipt renderer wraps lines that exceed the configured print width while preserving divider lines.</p>
<pre class="code-example"><code>def fit_text(value, width=COLUMNS):
    """Wrap oversized legacy/body rows without changing rows that already fit."""
    rows = []
    for line in str(value).splitlines(keepends=True):
        ending = '\\n' if line.endswith('\\n') else ''
        text = line.rstrip('\\r\\n')
        if len(text) > width:
            if text and set(text) &lt;= {'-', '='}:
                text = text[0] * width
            else:
                text = '\\n'.join(wrap(text, width=width,
                    replace_whitespace=False,
                    break_long_words=True, break_on_hyphens=False))
        rows.append(text + ending)
    return ''.join(rows)</code></pre>
<p><a href="https://github.com/JoesThomas/ThermalReceiptPrinterDailyTasks/blob/main/receipt/profile.py" target="_blank" rel="noopener noreferrer">View receipt/profile.py on GitHub</a></p>
<h3>2. Private configuration loading</h3><p>Configuration is loaded from a local JSON file rather than placing API secrets in public source files.</p>
<pre class="code-example"><code>def load(path=None):
    path = Path(path) if path is not None else ROOT / "passwords.json"
    if not path.exists():
        raise RuntimeError(f"Missing private configuration file: {path}")
    try:
        value = json.loads(path.read_text(encoding="utf-8"))
    except json.JSONDecodeError as error:
        raise RuntimeError(f"Invalid JSON in {path}: {error}") from error
    if not isinstance(value, dict):
        raise RuntimeError("passwords.json must contain a JSON object.")
    return value</code></pre>
<p><a href="https://github.com/JoesThomas/ThermalReceiptPrinterDailyTasks/blob/main/services/private_config.py" target="_blank" rel="noopener noreferrer">View services/private_config.py on GitHub</a></p>
</section><section class="cardx"><h2>How I work</h2><p>I value clear interfaces, reliable systems, automated testing and pragmatic technical decisions. My experience includes cloud services, CI/CD, databases and working with cross-functional teams.</p><div class="tags"><span>Java</span><span>TypeScript / Node.js</span><span>AWS</span><span>Azure</span><span>SQL</span><span>Docker</span><span>CI/CD</span></div></section></div></main></body></html>