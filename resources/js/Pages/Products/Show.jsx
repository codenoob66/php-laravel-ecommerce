import { Link } from "@inertiajs/react";
import { useForm } from "@inertiajs/react";

export default function Show({ product }) {
    const { data, setData, post } = useForm({
        product_id: product.id,
        quantity: 1,
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/cart/add");
    };
    return (
        <>
            <div>
                <h1>{product.name}</h1>
                <p>{product.price}</p>
                <p>{product.description}</p>
            </div>
            <form onSubmit={handleSubmit}>
                <button
                    type="button"
                    onClick={() =>
                        setData("quantity", Math.max(1, data.quantity - 1))
                    }
                >
                    -
                </button>
                <input
                    type="number"
                    value={data.quantity}
                    min="1"
                    onChange={(e) =>
                        setData("quantity", parseInt(e.target.value))
                    }
                />
                <button
                    type="button"
                    onClick={() => setData("quantity", data.quantity + 1)}
                >
                    +
                </button>
                <button type="submit">add to cart</button>
            </form>
            <Link href={`/products`}>Back to All Products</Link>
        </>
    );
}
