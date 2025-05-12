import pandas as pd
import numpy as np

# Set seed for reproducibility
np.random.seed(42)

# Number of samples
n_samples = 1000  # You can increase to 284807 if needed

# Generate Time (seconds from the first transaction)
time = np.random.randint(0, 172800, size=n_samples)  # up to 2 days in seconds

# Generate anonymized PCA features V1 to V28
pca_features = {f'V{i}': np.random.normal(0, 1, size=n_samples) for i in range(1, 29)}

# Generate Amounts (simulate realistic values)
amount = np.random.uniform(0.5, 2000, size=n_samples)

# Generate Class (fraud or not) - 1% fraud
fraud = np.random.choice([0, 1], size=n_samples, p=[0.99, 0.01])

# Combine into DataFrame
data = {
    'Time': time,
    **pca_features,
    'Amount': amount,
    'Class': fraud
}

df = pd.DataFrame(data)

# Save to Excel
df.to_excel('dummy_credit_card_fraud_dataset.xlsx', index=False)

print("Dummy dataset created and saved as 'dummy_credit_card_fraud_dataset.xlsx'")
