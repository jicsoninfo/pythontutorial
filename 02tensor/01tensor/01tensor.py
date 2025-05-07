import tensorflow as tf
from tensorflow.keras import layers, models

# Load the MNIST dataset (handwritten digits)
mnist = tf.keras.datasets.mnist

# Split the dataset into training and test data
(x_train, y_train), (x_test, y_test) = mnist.load_data()

# Normalize the pixel values (from [0, 255] to [0, 1])
x_train, x_test = x_train / 255.0, x_test / 255.0

# Define the model architecture
model = models.Sequential([
    layers.Flatten(input_shape=(28, 28)),    # Flatten the 28x28 images into 1D vector
    layers.Dense(128, activation='relu'),    # Fully connected layer with ReLU activation
    layers.Dropout(0.2),                     # Dropout layer for regularization
    layers.Dense(10, activation='softmax')   # Output layer (10 classes, softmax for multi-class classification)
])

# Compile the model
model.compile(optimizer='adam',
              loss='sparse_categorical_crossentropy',
              metrics=['accuracy'])

# Train the model
model.fit(x_train, y_train, epochs=5)

# Evaluate the model on the test dataset
test_loss, test_acc = model.evaluate(x_test, y_test)

print(f"Test accuracy: {test_acc}")
