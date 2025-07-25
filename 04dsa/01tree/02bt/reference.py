print("""
class Node:
    def __init__(self, key):
        self.key = key
        self.left = None
        self.right = None

class BinaryTree:
    def __init__(self, root_key):
        self.root = Node(root_key)

    def insert(self, key):
        from collections import deque
        queue = deque([self.root])

        while queue:
            node = queue.popleft()

            if not node.left:
                node.left = Node(key)
                return
            else:
                queue.append(node.left)

            if not node.right:
                node.right = Node(key)
                return
            else:
                queue.append(node.right)

    def inorder(self, node, result):
        if node:
            self.inorder(node.left, result)
            result.append(node.key)
            self.inorder(node.right, result)

    def preorder(self, node, result):
        if node:
            result.append(node.key)
            self.preorder(node.left, result)
            self.preorder(node.right, result)

    def postorder(self, node, result):
        if node:
            self.postorder(node.left, result)
            self.postorder(node.right, result)
            result.append(node.key)

    def height(self, node):
        if node is None:
            return 0
        return 1 + max(self.height(node.left), self.height(node.right))

    def size(self, node):
        if node is None:
            return 0
        return 1 + self.size(node.left) + self.size(node.right)

    def search(self, node, key):
        if node is None:
            return False
        if node.key == key:
            return True
        return self.search(node.left, key) or self.search(node.right, key)

# Example usage
bt = BinaryTree(1)
bt.insert(2)
bt.insert(3)
bt.insert(4)
bt.insert(5)

# Traversals
inorder_result = []
bt.inorder(bt.root, inorder_result)

preorder_result = []
bt.preorder(bt.root, preorder_result)

postorder_result = []
bt.postorder(bt.root, postorder_result)

# Properties
tree_height = bt.height(bt.root)
tree_size = bt.size(bt.root)

# Search
found = bt.search(bt.root, 4)
not_found = bt.search(bt.root, 99)

# Output results
print("Inorder:", inorder_result)
print("Preorder:", preorder_result)
print("Postorder:", postorder_result)
print("Height:", tree_height)
print("Size:", tree_size)
print("Search for 4:", found)
print("Search for 99:", not_found)

      

      $request->validate([
    'message' => [
        'required',
        'string',
        function ($attribute, $value, $fail) {
            // Block phone numbers (simple formats)
            if (preg_match('/\b\d{10,13}\b/', $value)) {
                $fail('Phone numbers are not allowed.');
            }

            // Block URLs (http, https, www, domain patterns)
            if (preg_match('/\b(?:https?:\/\/|www\.|[a-z0-9\-]+\.[a-z]{2,})\b/i', $value)) {
                $fail('URLs are not allowed.');
            }

            // Block email addresses
            if (preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/i', $value)) {
                $fail('Email addresses are not allowed.');
            }
        },
    ]
]);


""")

#🧠 Full Binary Tree Implementation (Recursive + Object-Oriented)

class Node:
    def __init__(self, key):
        self.key = key
        self.left = None
        self.right = None

class BinaryTree:
    def __init__(self):
        self.root = None

    # ✅ Recursive Insert
    def insert(self, key):
        if not self.root:
            self.root = Node(key)
        else:
            self._insert_recursive(self.root, key)

    def _insert_recursive(self, node, key):
        if key < node.key:
            if node.left:
                self._insert_recursive(node.left, key)
            else:
                node.left = Node(key)
        else:
            if node.right:
                self._insert_recursive(node.right, key)
            else:
                node.right = Node(key)

    # ✅ Inorder Traversal
    def inorder(self, node, result):
        if node:
            self.inorder(node.left, result)
            result.append(node.key)
            self.inorder(node.right, result)

    # ✅ Preorder Traversal
    def preorder(self, node, result):
        if node:
            result.append(node.key)
            self.preorder(node.left, result)
            self.preorder(node.right, result)

    # ✅ Postorder Traversal
    def postorder(self, node, result):
        if node:
            self.postorder(node.left, result)
            self.postorder(node.right, result)
            result.append(node.key)

    # ✅ Search
    def search(self, node, key):
        if node is None:
            return False
        if node.key == key:
            return True
        elif key < node.key:
            return self.search(node.left, key)
        else:
            return self.search(node.right, key)

    # ✅ Find depth of a node
    def depth(self, node, key, level=0):
        if node is None:
            return -1
        if node.key == key:
            return level
        elif key < node.key:
            return self.depth(node.left, key, level + 1)
        else:
            return self.depth(node.right, key, level + 1)

    # ✅ Size of tree (total nodes)
    def size(self, node):
        if node is None:
            return 0
        return 1 + self.size(node.left) + self.size(node.right)

    # ✅ Height of tree
    def height(self, node):
        if node is None:
            return 0
        return 1 + max(self.height(node.left), self.height(node.right))

    # ✅ Delete a node
    def delete(self, node, key):
        if node is None:
            return node

        if key < node.key:
            node.left = self.delete(node.left, key)
        elif key > node.key:
            node.right = self.delete(node.right, key)
        else:
            # Node found
            if node.left is None:
                return node.right
            elif node.right is None:
                return node.left

            # Node with two children
            min_larger_node = self._min_value_node(node.right)
            node.key = min_larger_node.key
            node.right = self.delete(node.right, min_larger_node.key)

        return node

    def _min_value_node(self, node):
        current = node
        while current.left:
            current = current.left
        return current

# ✅ Example usage
bt = BinaryTree()
for key in [10, 5, 20, 3, 7, 15, 25]:
    bt.insert(key)

inorder_result = []
bt.inorder(bt.root, inorder_result)

preorder_result = []
bt.preorder(bt.root, preorder_result)

postorder_result = []
bt.postorder(bt.root, postorder_result)

# Properties and operations
search_15 = bt.search(bt.root, 15)
search_99 = bt.search(bt.root, 99)
depth_of_15 = bt.depth(bt.root, 15)
tree_size = bt.size(bt.root)
tree_height = bt.height(bt.root)

# Delete node
bt.root = bt.delete(bt.root, 10)
inorder_after_delete = []
bt.inorder(bt.root, inorder_after_delete)

# ✅ Results
print("Inorder:", inorder_result)
print("Preorder:", preorder_result)
print("Postorder:", postorder_result)
print("Search 15:", search_15)
print("Search 99:", search_99)
print("Depth of 15:", depth_of_15)
print("Size:", tree_size)
print("Height:", tree_height)
print("Inorder After Deletion of 10:", inorder_after_delete)


# Inorder: [3, 5, 7, 10, 15, 20, 25]
# Preorder: [10, 5, 3, 7, 20, 15, 25]
# Postorder: [3, 7, 5, 15, 25, 20, 10]
# Search 15: True
# Search 99: False
# Depth of 15: 2
# Size: 7
# Height: 3
# Inorder After Deletion of 10: [3, 5, 7, 15, 20, 25]



#🧠 Step 2: Save this code as binary_tree_report.py

from fpdf import FPDF

# Example output data
inorder_result = [3, 5, 7, 10, 15, 20, 25]
preorder_result = [10, 5, 3, 7, 20, 15, 25]
postorder_result = [3, 7, 5, 15, 25, 20, 10]
search_15 = True
search_99 = False
depth_of_15 = 2
tree_size = 7
tree_height = 3
inorder_after_delete = [3, 5, 7, 15, 20, 25]

# Create PDF
pdf = FPDF()
pdf.set_auto_page_break(auto=True, margin=15)
pdf.add_page()

pdf.set_font("Arial", "B", 16)
pdf.cell(0, 10, "Binary Tree Report", ln=True, align="C")
pdf.ln(10)

pdf.set_font("Arial", "", 12)
pdf.cell(0, 10, "Inorder Traversal: " + str(inorder_result), ln=True)
pdf.cell(0, 10, "Preorder Traversal: " + str(preorder_result), ln=True)
pdf.cell(0, 10, "Postorder Traversal: " + str(postorder_result), ln=True)
pdf.ln(5)

pdf.cell(0, 10, f"Search for 15: {'Found' if search_15 else 'Not Found'}", ln=True)
pdf.cell(0, 10, f"Search for 99: {'Found' if search_99 else 'Not Found'}", ln=True)
pdf.cell(0, 10, f"Depth of 15: {depth_of_15}", ln=True)
pdf.cell(0, 10, f"Size of Tree: {tree_size}", ln=True)
pdf.cell(0, 10, f"Height of Tree: {tree_height}", ln=True)
pdf.ln(5)

pdf.cell(0, 10, "Inorder After Deleting 10: " + str(inorder_after_delete), ln=True)

pdf.output("Binary_Tree_Full_Report.pdf")
print("PDF saved as Binary_Tree_Full_Report.pdf")
