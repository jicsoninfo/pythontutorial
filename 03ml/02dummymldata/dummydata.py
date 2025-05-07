#Step-by-step: Generate Excel with Dummy ML Data
import pandas as pd
import numpy as np

# Define number of rows
num_rows = 100

# Create dummy data
data = {
    'ID': range(1, num_rows + 1),
    'Age': np.random.randint(18, 70, size=num_rows),
    'Salary': np.random.randint(30000, 120000, size=num_rows),
    'Gender': np.random.choice(['Male', 'Female'], size=num_rows),
    'Purchased': np.random.choice([0, 1], size=num_rows)  # Target column
}

# Create DataFrame
df = pd.DataFrame(data)

# Save to Excel
df.to_excel('dummy_ml_dataset.xlsx', index=False)
