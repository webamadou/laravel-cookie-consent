<div hidden>
  <h2>Cookie settings</h2>
  <form method="POST" action="{{ route('cookie-consent.store') }}">
    @csrf
    <label><input type="checkbox" disabled checked> Essentials</label>
    <label><input type="checkbox" name="preferences" value="1"> Preferences</label>
    <label><input type="checkbox" name="analytics" value="1"> Analytics</label>
    <label><input type="checkbox" name="marketing" value="1"> Marketing</label>
    <button type="submit">Save</button>
  </form>
  <form method="POST" action="{{ route('cookie-consent.revoke') }}">
    @csrf
    <button type="submit">Revoke</button>
  </form>
</div>
