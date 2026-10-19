<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>New signup</title>
  </head>
  <body style="font-family: system-ui, sans-serif; background:#f6f6f6; padding: 24px;">
    <div style="max-width: 560px; margin: 0 auto; background: #ffffff; border-radius: 12px; padding: 24px;">
      <h1 style="font-size: 18px; margin: 0 0 12px;">New PPLG signup</h1>
      <p style="margin: 0 0 8px; font-size: 14px; color:#333;">
        Someone just signed up from the PPLG landing page.
      </p>
      <ul style="margin: 16px 0 0; padding-left: 18px; font-size: 13px; color:#444;">
        <li><strong>Email:</strong> {{ $signup->email }}</li>
        <li><strong>IP:</strong> {{ $signup->ip_address }}</li>
        <li><strong>When:</strong> {{ $signup->created_at->toDateTimeString() }}</li>
      </ul>
    </div>
  </body>
</html>
