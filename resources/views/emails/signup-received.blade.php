<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark">
    <meta name="supported-color-schemes" content="dark">
    <title>New PPLG signup</title>
  </head>
  <body
    style="margin:0; padding:0; background-color:#0a0a0a; font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif; -webkit-font-smoothing:antialiased;">

    <div style="display:none; max-height:0; overflow:hidden; opacity:0; color:transparent;">
      New signup from {{ $signup->email }}
    </div>

    <table role="presentation" style="background-color:#0a0a0a;" width="100%" cellpadding="0" cellspacing="0"
      border="0" bgcolor="#0a0a0a">
      <tr>
        <td style="padding: 40px 16px;" align="center">

          <table role="presentation" style="max-width: 560px; width:100%;" width="100%" cellpadding="0"
            cellspacing="0" border="0">

            <tr>
              <td style="background-color:#ffffff; border-radius: 10px 10px 0 0; padding: 12px 16px;">
                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td style="width:10px; height:10px; border-radius:50%; background-color:#e5484d;"></td>
                    <td style="width:6px;"></td>
                    <td style="width:10px; height:10px; border-radius:50%; background-color:#f5d90a;"></td>
                    <td style="width:6px;"></td>
                    <td style="width:10px; height:10px; border-radius:50%; background-color:#30a46c;"></td>
                    <td style="padding-left: 12px;">
                      <span
                        style="font-family: 'JetBrains Mono', Menlo, Consolas, monospace; font-size: 12px; font-weight: 700; color:#0a0a0a;">
                        PPLG@mail — signup
                      </span>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>

            <tr>
              <td
                style="background-color:#161616; border:1px solid #262626; border-top:0; border-radius: 0 0 10px 10px; padding: 32px;">

                <p
                  style="margin:0 0 8px; font-family: 'JetBrains Mono', Menlo, Consolas, monospace; font-size: 12px; color:#9a9a9a;">
                  ~/pplg $ <span style="color:#ffffff;">cat new-signup.log</span>
                </p>

                <h1
                  style="margin:0 0 20px; font-family: 'Inter', Helvetica, Arial, sans-serif; font-size: 22px; line-height:1.3; font-weight: 600; color:#ffffff;">
                  New PPLG signup
                </h1>

                <p style="margin:0 0 24px; font-size: 14px; line-height:1.6; color:#9a9a9a;">
                  Someone just signed up from the PPLG landing page.
                </p>

                <table role="presentation" style="border-collapse: separate; border-spacing: 0 8px;" width="100%"
                  cellpadding="0" cellspacing="0" border="0">

                  <tr>
                    <td
                      style="font-family: 'JetBrains Mono', Menlo, Consolas, monospace; font-size: 12px; color:#9a9a9a; padding: 12px 12px 12px 16px; background-color:#0a0a0a; border:1px solid #262626; border-right:0; border-radius: 8px 0 0 8px;"
                      width="90" valign="top">
                      email
                    </td>
                    <td
                      style="font-family: 'Inter', Helvetica, Arial, sans-serif; font-size: 14px; color:#ffffff; padding: 12px 16px 12px 12px; background-color:#0a0a0a; border:1px solid #262626; border-left:0; border-radius: 0 8px 8px 0; word-break: break-all;"
                      valign="top">
                      {{ $signup->email }}
                    </td>
                  </tr>

                  <tr>
                    <td
                      style="font-family: 'JetBrains Mono', Menlo, Consolas, monospace; font-size: 12px; color:#9a9a9a; padding: 12px 12px 12px 16px; background-color:#0a0a0a; border:1px solid #262626; border-right:0; border-radius: 8px 0 0 8px;"
                      width="90" valign="top">
                      ip
                    </td>
                    <td
                      style="font-family: 'Inter', Helvetica, Arial, sans-serif; font-size: 14px; color:#ffffff; padding: 12px 16px 12px 12px; background-color:#0a0a0a; border:1px solid #262626; border-left:0; border-radius: 0 8px 8px 0;"
                      valign="top">
                      {{ $signup->ip_address ?? '—' }}
                    </td>
                  </tr>

                  <tr>
                    <td
                      style="font-family: 'JetBrains Mono', Menlo, Consolas, monospace; font-size: 12px; color:#9a9a9a; padding: 12px 12px 12px 16px; background-color:#0a0a0a; border:1px solid #262626; border-right:0; border-radius: 8px 0 0 8px;"
                      width="90" valign="top">
                      when
                    </td>
                    <td
                      style="font-family: 'Inter', Helvetica, Arial, sans-serif; font-size: 14px; color:#ffffff; padding: 12px 16px 12px 12px; background-color:#0a0a0a; border:1px solid #262626; border-left:0; border-radius: 0 8px 8px 0;"
                      valign="top">
                      {{ $signup->created_at->toDayDateTimeString() }}
                    </td>
                  </tr>

                </table>

                <p
                  style="margin: 24px 0 0; font-family: 'JetBrains Mono', Menlo, Consolas, monospace; font-size: 12px; color:#9a9a9a;">
                  ~/pplg $ <span style="color:#ffffff;">▍</span>
                </p>

              </td>
            </tr>

            <tr>
              <td style="padding: 20px 8px 0;" align="center">
                <p
                  style="margin:0; font-family: 'JetBrains Mono', Menlo, Consolas, monospace; font-size: 11px; color:#9a9a9a;">
                  PPLG - SMK Prakarya Internasional
                </p>
                <p
                  style="margin: 4px 0 0; font-family: 'JetBrains Mono', Menlo, Consolas, monospace; font-size: 11px; color:#5a5a5a;">
                  Automated message. Do not reply.
                </p>
              </td>
            </tr>

          </table>

        </td>
      </tr>
    </table>

  </body>
</html>
