import { Link } from "@inertiajs/react";

export default function Index({ cartItems }) {
    return (
        <>
            {/* {cartItems.map((item) => (
                <div key={item.id}>
                    <h1>{item.name}</h1>
                </div>
            ))} */}

            {cartItems.map((item) => {
                return (
                    <div key={item.id}>
                        <h1>{item.name}</h1>
                        <span>{item.quantity}</span>
                        <br />
                        <span>{item.price}</span>
                        <br />
                        <span>Total:</span>
                    </div>
                );
            })}
            <Link href={`/checkout`}>Check Out</Link>
        </>
    );
}
