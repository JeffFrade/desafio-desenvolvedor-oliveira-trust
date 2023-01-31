<table>
    <tr>
        <th>Valor Total:</th>
        <td>{{ $data['original_value'] }}</td>
    </tr>

    <tr>
        <th>Moeda:</th>
        <td>{{ $data['currency']['name'] }}</td>
    </tr>

    <tr>
        <th>Desconto (Taxa de Conversão):</th>
        <td>{{ $data['discounts']['percentage_conversion_rate'] }}</td>
    </tr>

    <tr>
        <th>Método de Pagamento:</th>
        <td>{{ $data['payment_method']['name'] }}</td>
    </tr>

    <tr>
        <th>Desconto (Taxa do Método de Pagamento):</th>
        <td>{{ $data['discounts']['percentage_payment_method'] }}</td>
    </tr>

    <tr>
        <th>Valor Convertido:</th>
        <td>{{ $data['converted_value'] }}</td>
    </tr>
</table>
