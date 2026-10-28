<?php require_once __DIR__.'/includes/portfolio-seo.php'; ?>
<!doctype html><html lang="en"><head><?php portfolioSeo('Projects | Joe Thomas — Software Engineer','Explore software engineering projects by Joe Thomas, including Python automation, APIs, and full-stack development.','/allprojects.php'); ?><link rel="stylesheet" href="assets/css/portfolio.css?v=4"></head><body>
<?php include __DIR__.'/includes/Header.php'; ?>
<main class="portfolio"><div class="wrap"><p class="eyebrow">Selected work</p><h1>Software built to solve real problems.</h1><p class="lead">I develop backend systems, APIs and automation tools, with experience spanning Python, Java, C#/.NET and cloud infrastructure. Here are examples of how I approach engineering challenges.</p>
<div class="actions"><a class="action primary" href="CV.php">View my CV</a><a class="action" href="https://github.com/JoesThomas" target="_blank" rel="noopener noreferrer">GitHub profile</a></div>
<div class="gridx">
<article class="cardx"><p class="eyebrow">Personal project</p><h2>Thermal Receipt Printer — Daily Tasks</h2><p>A Python-powered application that gathers daily information into a compact printed receipt, with a web interface for configuration and previews.</p><p><strong>Engineering challenges:</strong> integrating third-party services, coordinating data retrieval, formatting constrained printer output, and handling errors gracefully.</p><div class="tags"><span>Python</span><span>Flask</span><span>APIs</span><span>Automation</span><span>Hardware integration</span></div><a href="https://github.com/JoesThomas/ThermalReceiptPrinterDailyTasks" target="_blank" rel="noopener noreferrer">Explore the source code</a></article>
<article class="cardx"><p class="eyebrow">Professional experience</p><h2>API integration and delivery</h2><p>Built a backend API from the ground up while coordinating with developers at the Metropolitan Police, delivering the integration to schedule.</p><p><strong>Engineering focus:</strong> API contracts, stakeholder communication, maintainable backend code and dependable delivery.</p><div class="tags"><span>Backend</span><span>REST APIs</span><span>Integration</span><span>Collaboration</span></div><p class="note">Professional work is described at a high level to respect confidentiality.</p></article>
<article class="cardx"><p class="eyebrow">Professional experience</p><h2>Enterprise backend development</h2><p>Worked with C# and .NET on a backend application with a lightweight graphical interface at BAE Systems.</p><p><strong>Engineering focus:</strong> maintainability, backend implementation and working within an established development team.</p><div class="tags"><span>C#</span><span>.NET</span><span>Backend</span></div><p class="note">Implementation details are not public.</p></article>
</div>
<section class="cardx"><p class="eyebrow">From the source code</p><h2>Real implementation examples</h2><p>These excerpts are taken from my public Thermal Receipt Printer repository. They show how I handle device constraints and protect private configuration.</p>
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