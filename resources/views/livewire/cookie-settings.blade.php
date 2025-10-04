<div
    x-data
    x-show="@js($open)"
    x-cloak
    style="position: fixed; inset: 0; display: grid; place-items: center; background: rgba(0,0,0,.5); padding: 1rem;"
>
    <div style="background:#fff; border-radius:12px; padding:16px; max-width:560px; width:100%;">
        <h2 style="margin:0 0 8px; font-size:18px;">Paramètres des cookies</h2>
        <p style="margin:0 0 12px; color:#555;">Activez/désactivez les catégories non essentielles.</p>

        <div style="display:grid; gap:8px; margin-bottom:12px;">
            <label style="display:flex; gap:12px; align-items:flex-start;">
                <input type="checkbox" disabled checked>
                <span><strong>Essentiels</strong> — Nécessaires au fonctionnement du site.</span>
            </label>

            @foreach($definedCategories as $cat => $val)
                @continue($cat === 'essential')
                <label style="display:flex; gap:12px; align-items:flex-start;">
                    <input type="checkbox" wire:model.live="categories.{{ $cat }}">
                    <span><strong>{{ ucfirst($cat) }}</strong></span>
                </label>
            @endforeach
        </div>

        <div style="display:flex; gap:8px; flex-wrap:wrap;">
            <button type="button" wire:click="save">Enregistrer</button>
            <button type="button" wire:click="acceptAll">Tout accepter</button>
            <button type="button" wire:click="rejectNonEssential">Refuser non essentiels</button>
            <button type="button" wire:click="revoke" style="margin-left:auto;">Révoquer</button>
            <button type="button" wire:click="close">Fermer</button>
        </div>
    </div>
</div>
