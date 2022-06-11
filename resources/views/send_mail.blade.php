<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
      div {
        width: 100%;
      }
      div:first-child {
        display: flex;
        justify-content:
        space-between;
        padding: 30px 0;
      }
      div:last-child {
        margin: 50px 0;text-align: center;
      }
    </style>
  </head>
  <body>
    <div>
      <p>Sender : {{ $nameSender . '(' . $emailSender . ')' }}</p>
      @if ($companySender)
      <p>From Company {{ $companySender }}</p>
      @endif
      <p>From Country : {{ $countrySender }}</p>
    </div>
    <div>
      <p>{{ $bodySender }}</p>
    </div>

  </body>
</html>
