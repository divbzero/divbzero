<style>
  /* sections */
  body {
    line-height: 1.5;
    font-family: Helvetica;
  }

  header {
    text-align: center;
    font-size: 13px;
    color: #999;
  }
  footer {
    text-align: center;
    color: #333;
  }
  /* headings */
  h1 {
    font-size: 28px;
    color: #444;
  }
  h2 {
    font-size: 21px;
    color: #777;
  }
  h3 {
    font-size: 14px;
    color: #666;
  }
  h3 {
    font-size: 14px;
    font-style: italic;
    color: #555;
  }
  /* links */
  a {
    text-decoration: none;
    color: steelblue;
  }
  footer a {
    text-decoration: underline;
    color: inherit;
  }
</style>

<header>
  <i>
    This is the latest post from my blog.<br>
    Thank you for subscribing.
  </i>
</header>

<main>
  <h2><a href="*|RSSITEM:URL|*" title="*|RSSITEM:TITLE|*">*|RSSITEM:TITLE|*</a></h2>
  <h3>*|RSSITEM:DATE:M Y|*</h3>
  *|RSSITEM:CONTENT_FULL|*
</main>

<footer>
  Copyright © *|CURRENT_YEAR|* *|LIST:COMPANY|*<br>
  All rights reserved.

  *|LIST:ADDRESS_HTML|*

  To stop receiving these emails, you can <a href="*|UNSUB|*">unsubscribe</a>.
  <a href="*|UPDATE_PROFILE|*">Click here to change your email or update your profile.</a>

  *|REWARDS|*
</footer>
