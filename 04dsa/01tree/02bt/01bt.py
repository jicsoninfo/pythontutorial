

class NodeBt:
    def __init__(self, key):
        self.key = key
        self.left = None
        self.right = None


class BT:
    def __init__(self, root_key):
        self.root = NodeBt(root_key)

    def insert(self, key):
        from collections import deque
        queue = deque([self.root])

        while queue:
            node = queue.popleft()

            if not node.left:
                node.left = NodeBt(key)
                return
            else:
                queue.append(node.left)

            if not node.right:
                node.right = NodeBt(key)
                return
            else:
                queue.append(node.right)

    def print_tree(self):
        from collections import deque
        if not self.root:
            print("Tree is empty")
            return

        queue = deque([self.root])
        while queue:
            node = queue.popleft()
            print(node.key, end=' ')

            if node.left:
                queue.append(node.left)
            if node.right:
                queue.append(node.right)

    def __str__(self):
        from collections import deque
        result = []
        queue = deque([self.root])
        while queue:
            node = queue.popleft()
            result.append(str(node.key))
            if node.left:
                queue.append(node.left)
            if node.right:
                queue.append(node.right)
        return ' '.join(result)


# Example usage
bt = BT(1)
bt.insert(2)
bt.insert(3)
bt.insert(4)

bt.print_tree()  # prints: 1 2 3 4
print()          # for newline
print(bt)        # prints: 1 2 3 4

      
 