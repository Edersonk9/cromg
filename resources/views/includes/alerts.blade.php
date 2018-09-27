<!-- MESSAGE ALERT -->
<div>
  <!-- MESSAGE ALERT SUCCESS -->
  @if (session('success'))
    {{ alerta("success",session('success')) }}
  @endif
  <!-- MESSAGE ALERT SUCCESS -->
  <!-- MESSAGE ALERT DANGER -->
  @if (session('danger'))
    {{ alerta("error",session('danger')) }}
  @endif
  <!-- MESSAGE ALERT DANGER -->
  <!-- MESSAGE ALERT INFO -->
  @if (session('info'))
    {{ alerta("info",session('info')) }}
  @endif
  <!-- MESSAGE ALERT INFO -->
  <!-- MESSAGE ALERT ALERTA -->
  @if (session('warning'))
    {{ alerta("warning",session('warning')) }}
  @endif
  <!-- MESSAGE ALERT ALERTA -->
</div>
<!-- MESSAGE ALERT   -->
<!-- MESSAGE ALERT -->
{{-- <div>
  <!-- MESSAGE ALERT SUCCESS -->
  @if (session('success'))
    <script>setTimeout("document.getElementById('alerta-1').style.display = 'none'", 5000););</script>
    <p id="alerta-1" class="alert alert-success">{{ session('success') }}</p>
  @endif
  <!-- MESSAGE ALERT SUCCESS -->
  <!-- MESSAGE ALERT DANGER -->
  @if (session('danger'))
    <script>setTimeout("document.getElementById('alerta-1').style.display = 'none'", 5000);</script>
    <p id="alerta-1" class="alert alert-danger">{{ session('danger') }}</p>
  @endif
  <!-- MESSAGE ALERT DANGER -->
</div> --}}
<!-- MESSAGE ALERT   -->
