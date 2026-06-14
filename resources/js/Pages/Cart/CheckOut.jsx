export default function ({ products, grandTotal, totalQuantity }) {
    return (
        <>
            {products.map((product) => (
                <div key={product.id}>
                    <h1>{product.name}</h1>
                    <span>{product.quantity}</span>
                    <br />
                    <span>{product.price}</span>
                </div>
            ))}
            <strong>Total: {grandTotal}</strong>
            <br />
            <strong>Total items: {products.length}</strong>
        </>
    );
}
