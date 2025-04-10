const tf = require('@tensorflow/tfjs');
const { Input, Embedding, Flatten, Dot, Dense, Model } = require('@tensorflow/tfjs-layers');

// Load the dataset
const data = {
    user_id: [1, 1, 2, 2],
    product_id: [101, 102, 101, 103],
    interaction: [5, 3, 4, 2]
};

// Normalize user and product IDs
data.user_id = data.user_id.map(id => id - 1);
data.product_id = data.product_id.map(id => id - 101);

// Define the number of users and products
const num_users = [...new Set(data.user_id)].length;
const num_products = [...new Set(data.product_id)].length;

// Define the embedding size
embedding_size = 50;

// Build the model
const user_input = Input({ shape: [1] });
const product_input = Input({ shape: [1] });
// Removed invalid terminal command
user_embedding = Embedding(num_users, embedding_size)(user_input)
product_embedding = Embedding(num_products, embedding_size)(product_input)

user_vector = Flatten()(user_embedding)
product_vector = Flatten()(product_embedding)

dot_product = Dot(axes=1)([user_vector, product_vector])

// Add a dense layer for prediction
const output = Dense({ units: 1, activation: 'linear' }).apply(dot_product);

const model = tf.model({ inputs: [user_input, product_input], outputs: output });
model.compile({ optimizer: 'adam', loss: 'meanSquaredError' });

// Prepare training data
const X = [tf.tensor(data.user_id), tf.tensor(data.product_id)];
const y = tf.tensor(data.interaction);

// Train the model
model.fit(X, y, { epochs: 10, batchSize: 2 }).then(() => {
    // Save the model
    model.save('file://recommendation_model');
});