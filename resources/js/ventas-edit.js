export function initVentaEdit() {
    const root = document.getElementById('venta-edit');
    if (!root) return;

    const body = document.getElementById('venta-items-body');
    const totalEl = document.getElementById('venta-total');
    const msgEl = document.getElementById('venta-edit-msg');
    const btnConfirmar = document.getElementById('btn-confirmar-edicion');
    const btnCancelar = document.getElementById('btn-cancelar-edicion');

    const money = (n) => `$ ${Number(n).toFixed(2)}`;

    const showMsg = (text, isError = false) => {
        msgEl.textContent = text;
        msgEl.className = `mt-2 text-sm ${isError ? 'text-red-500' : 'text-green-600'}`;
    };

    const recalcularTotal = () => {
        let total = 0;
        body.querySelectorAll('.subtotal[data-value]').forEach((el) => {
            total += Number(el.dataset.value);
        });
        totalEl.textContent = money(total);
    };

    const actualizarFilaSubtotal = (row) => {
        const precio = Number(row.dataset.precio);
        const cantidad = Number(row.querySelector('.cantidad-input').value);
        const subtotal = precio * cantidad;
        const subtotalEl = row.querySelector('.subtotal');
        subtotalEl.dataset.value = subtotal;
        subtotalEl.textContent = money(subtotal);
        recalcularTotal();
    };

    const mostrarVaciaSiCorresponde = () => {
        if (!body.querySelector('tr[data-prod-id]')) {
            body.innerHTML =
                '<tr id="venta-items-empty"><td colspan="6" class="py-4 text-center text-slate-500">No quedan productos en esta venta.</td></tr>';
        }
    };

    body.addEventListener('change', (e) => {
        if (!e.target.classList.contains('cantidad-input')) return;

        const input = e.target;
        const row = input.closest('tr[data-prod-id]');
        const cantidadAnterior = row.dataset.cantidadActual;
        const cantidad = parseInt(input.value, 10);

        if (!cantidad || cantidad < 1) {
            input.value = cantidadAnterior;
            showMsg('La cantidad debe ser mayor a 0.', true);
            return;
        }

        input.disabled = true;
        axios
            .patch(row.dataset.updateUrl, { cantidad })
            .then(() => {
                row.dataset.cantidadActual = cantidad;
                actualizarFilaSubtotal(row);
                showMsg('Cantidad actualizada.');
            })
            .catch(() => {
                input.value = cantidadAnterior;
                showMsg('No se pudo actualizar la cantidad.', true);
            })
            .finally(() => {
                input.disabled = false;
            });
    });

    body.addEventListener('click', (e) => {
        if (!e.target.classList.contains('btn-quitar')) return;

        const row = e.target.closest('tr[data-prod-id]');

        e.target.disabled = true;
        axios
            .delete(row.dataset.quitarUrl)
            .then(() => {
                row.remove();
                recalcularTotal();
                mostrarVaciaSiCorresponde();
                showMsg('Producto quitado.');
            })
            .catch(() => {
                e.target.disabled = false;
                showMsg('No se pudo quitar el producto.', true);
            });
    });

    btnConfirmar.addEventListener('click', () => {
        if (!body.querySelector('tr[data-prod-id]')) {
            showMsg('No hay productos para confirmar.', true);
            return;
        }
        if (!confirm('¿Confirmar los cambios de esta venta?')) return;

        btnConfirmar.disabled = true;
        axios
            .post(root.dataset.confirmUrl)
            .then(() => {
                window.location.href = root.dataset.redirectUrl;
            })
            .catch(() => {
                btnConfirmar.disabled = false;
                showMsg('No se pudieron guardar los cambios.', true);
            });
    });

    btnCancelar.addEventListener('click', () => {
        if (!confirm('¿Descartar los cambios y salir?')) return;

        btnCancelar.disabled = true;
        axios
            .post(root.dataset.cancelUrl)
            .then((res) => {
                window.location.href = res.data.redirect || root.dataset.redirectUrl;
            })
            .catch(() => {
                btnCancelar.disabled = false;
                showMsg('No se pudo cancelar la edición.', true);
            });
    });
}
