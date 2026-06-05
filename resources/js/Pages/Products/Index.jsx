export default function Index({ products }) {
    return (
        <div className="max-w-7xl mx-auto p-6">
            <h1 className="text-3xl font-bold mb-6 text-gray-900">
                My Products list
            </h1>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                {products.map((product) => (
                    <div
                        key={product.id}
                        className="bg-white p-6 rounded-lg shadow-md border border-gray-100"
                    >
                        <h2 className="text-xl font-semibold text-gray-800">
                            {product.name}
                        </h2>
                        <span className="mt-2 text-gray-600">
                            {product.price}
                        </span>
                        <p className="mt-2 text-gray-600">
                            {product.description}
                        </p>
                    </div>
                ))}
            </div>
        </div>
    );
}
