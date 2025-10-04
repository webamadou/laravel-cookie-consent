@if($visible)
<div style="position:fixed; left:0; right:0; bottom:0; padding:12px; background:#fff; border-top:1px solid #eee;">
    <div style="max-width:980px; margin:0 auto; display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
        <div style="font-size:14px;">
            <strong>Cookies</strong> — Nous utilisons des cookies essentiels, et des cookies de préférences, statistiques et marketing si vous l’autorisez.
        </div>

        <div style="display:flex; gap:8px; margin-left:auto;">
            <button type="button" wire:click="acceptAll">Tout accepter</button>
            <button type="button" wire:click="reject">Refuser non essentiels</button>
            <button type="button" wire:click="openSettings">Personnaliser</button>
        </div>
    </div>
</div>
@endif
