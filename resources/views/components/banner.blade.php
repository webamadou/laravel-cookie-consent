@if(empty($cookieConsent['analytics']))
<div>
  <p>We use cookies (essentials + optional categories).</p>
  <form method="POST" action="{{ route('cookie-consent.store') }}">
    @csrf
    <input type="hidden" name="preferences" value="1">
    <input type="hidden" name="analytics" value="1">
    <input type="hidden" name="marketing" value="1">
    <button type="submit">Accept all</button>
  </form>
  <form method="POST" action="{{ route('cookie-consent.store') }}">
    @csrf
    <button type="submit">Reject non-essentials</button>
  </form>
</div>
@endif
