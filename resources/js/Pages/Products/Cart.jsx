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
                    </div>
                );
            })}
            <button>Check Out</button>
        </>
    );
}
