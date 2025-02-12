<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Pesan Baru</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
      }

      .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }

      .header {
        background-color: #007bff;
        color: #ffffff;
        padding: 15px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
      }

      .header h1 {
        margin: 0;
        font-size: 24px;
      }

      .content {
        padding: 20px;
      }

      .content p {
        margin-bottom: 15px;
        font-size: 16px;
        line-height: 1.5;
      }

      .footer {
        background-color: #f8f9fa;
        padding: 15px;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
        text-align: center;
        font-size: 14px;
        color: #6c757d;
      }

      .footer a {
        color: #007bff;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1>Notifikasi Pesan Baru</h1>
      </div>
      <div class="content">
        <p>Halo Admin,</p>
        <p>Pesan baru telah diterima dari pengguna. Berikut adalah detail pesan tersebut:</p>
        <p><strong>Nama:</strong> {{ $contactMessage->name }}</p>
        <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
        <p><strong>No. Telepon:</strong> {{ $contactMessage->phone ?? 'Tidak tersedia' }}</p>
        <p><strong>Pesan:</strong></p>
        <blockquote style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #007bff; margin-left: 0;">
          {{ $contactMessage->message }}
        </blockquote>
      </div>
      <div class="footer">
        <p>&copy; {{ date('Y') }} IEC Denpasar. Semua hak cipta dilindungi undang-undang.</p>
        <p>Jika Anda memiliki pertanyaan, silakan hubungi kami di <a
            href="mailto:support@iec-denpasar.com">support@iec-denpasar.com</a>.</p>
      </div>
    </div>
  </body>
</html>
