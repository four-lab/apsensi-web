<div style="background:#f9f9f9;background-color:#f9f9f9;Margin:0px auto;max-width:600px;">
    <table
        align="center"
        border="0"
        cellpadding="0"
        cellspacing="0"
        role="presentation"
        style="background:#f9f9f9;background-color:#f9f9f9;width:100%;"
    >
        <tbody>
            <tr>
                <td
                    style="border-bottom:#333957 solid 5px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div style="background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;">
    <table
        align="center"
        border="0"
        cellpadding="0"
        cellspacing="0"
        role="presentation"
        style="background:#fff;background-color:#fff;width:100%;"
    >
        <tbody>
            <tr>
                <td
                    style="border:#dddddd solid 1px;border-top:0px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                    <div
                        class="mj-column-per-100 outlook-group-fix"
                        style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;"
                    >
                        <table
                            border="0"
                            cellpadding="0"
                            cellspacing="0"
                            role="presentation"
                            style="vertical-align:bottom;"
                            width="100%"
                        >
                            <tr>
                                <td
                                    align="center"
                                    style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                >
                                    <table
                                        align="center"
                                        border="0"
                                        cellpadding="0"
                                        cellspacing="0"
                                        role="presentation"
                                        style="border-collapse:collapse;border-spacing:0px;"
                                    >
                                        <tbody>
                                            <tr>
                                                <td style="width:64px;">
                                                    <!-- <img height="auto" src="https://i.imgur.com/KO1vcE9.png" style="border:0;display:block;outline:none;text-decoration:none;width:100%;" width="64" /> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    align="center"
                                    style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;"
                                >
                                    <div
                                        style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:32px;font-weight:bold;line-height:1;text-align:center;color:#555;">
                                        Kode Verifikasi</div>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    align="center"
                                    style="font-size:0px;padding:10px 25px;padding-bottom:20px;word-break:break-word;"
                                >
                                    <div
                                        style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:center;color:#555;">
                                        Gunakan kode di bawah untuk mereset password anda</div>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    align="center"
                                    style="font-size:0px;padding:10px 25px;padding-top:30px;padding-bottom:40px;word-break:break-word;"
                                >
                                    <table
                                        align="center"
                                        border="0"
                                        cellpadding="0"
                                        cellspacing="0"
                                        role="presentation"
                                        style="border-collapse:separate;line-height:100%;"
                                    >
                                        <tr>
                                            <td
                                                align="center"
                                                bgcolor="#2F67F6"
                                                role="presentation"
                                                style="border:none;border-radius:3px;color:#ffffff;cursor:auto;padding:10px 20px;"
                                                valign="middle"
                                            >
                                                <p
                                                    style="background:#2F67F6;color:#ffffff;font-family:'Helvetica Neue',Arial,sans-serif;font-size:30px;letter-spacing:4px;font-weight:bold;line-height:120%;Margin:0;text-decoration:none;text-transform:none;"
                                                    id="code"
                                                >{{ $otp->code }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    align="center"
                                    style="font-size:0px;padding:10px 25px;padding-bottom:20px;word-break:break-word;"
                                >
                                    <div
                                        style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:14px;line-height:22px;text-align:center;color:#555;">
                                        Kode akan kedaluwarsa pada {{ $otp->expired->format('d/m/Y H:i') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    align="center"
                                    style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                >
                                    <div
                                        style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:14px;line-height:22px;text-align:center;color:#555;">
                                        {{ config('app.name') }}<br> <a
                                            href="mailto:info@example.com"
                                            style="color:#2F67F6"
                                        >{{ env('MAIL_FROM_ADDRESS') }}</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
